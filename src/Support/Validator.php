<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017/12/11
 * Time: 13:52
 */

namespace Reprover\Amap\Support;


use Reprover\Amap\Exceptions\InvalidArgumentException;

class Validator
{

    protected $params;
    protected $data;
    protected $rules;
    protected $switched = [];
    protected $unique = [];
    protected $switchMany = [];

    public function __construct(Config $data, $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function validate()
    {
        foreach ($this->rules as $key => $many_rules) {
            $many_rules = explode("|", $many_rules);
            foreach ($many_rules as $k => $v) {
                $rule = explode(":", $v);
                if (method_exists($this, $rule[0]))
                    $this->{$rule[0]}($key, $this->data->get($key), [isset($rule[1]) ? $rule[1] : '', isset($rule[2]) ? $rule[2] : '']);
                else
                    $this->fail("The Validator Doesn't Exist");

            }
        }
        $this->validateSwitched();
        $this->validateUnique();
        $this->validateSwitchMany();
        return $this->params;
    }

    private function pass($key, $value)
    {
        $this->params[$key] = $value;
    }

    /**
     * @param string $message
     * @throws InvalidArgumentException
     */
    private function fail($message = 'The Given Data Cannot Pass The Validation.')
    {
        throw new InvalidArgumentException($message);
    }


    /**
     * @param $key
     * @param $field
     * @param array ...$rule
     * @throws InvalidArgumentException
     */
    private function required($key, $field, ...$rule)
    {
        if (!$field)
            $this->fail("The {$key} is Required");
        $this->pass($key, $field);
    }

    /**
     * @param $key
     * @param $field
     * @param array ...$rule
     */
    private function nullable($key, $field, ...$rule)
    {
        $this->pass($key, $field);
    }

    /**
     * @param $key
     * @param $field
     * @param array $rule
     */
    private function switched($key, $field, ...$rule)
    {
        $group = $rule[1];
        $this->switched[$group] = $field ? isset($this->switched[$group]) ? $this->switched[$group] + 1 : 1 : 0;
        $this->pass($key, $field);
    }

    /**
     * @param $key
     * @param $field
     * @param array $rule
     */
    private function unique($key, $field, ...$rule)
    {
        $group = $rule[1];
        $this->unique[$group] = $field ? isset($this->unique[$group]) ? $this->unique[$group] + 1 : 1 : 0;
        $this->pass($key, $field);
    }

    /**
     * @param $key
     * @param $field
     * @param array ...$rule
     * @throws InvalidArgumentException
     */
    private function datetime($key, $field, ...$rule)
    {
        if (preg_match("/\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:d{2}/", $field))
            $this->pass($key, $field);
        else
            $this->fail("The {$key} is Not The Format Like Datetime.");
    }

    private function switchMany($k, $field, ...$rule)
    {
        $group = $rule[1];
        $key = explode(",", $rule[2]);
        $this->switchMany[$group]['common'][] = $key;
        foreach ($key as $value)
            if ($k == $value)
                $this->switchMany[$group][$value] = $field ? isset($this->switchMany[$group][$value]) ? $this->switchMany[$group][$value] + 1 : 1 : 0;
            else
                $this->switchMany[$group][$value] = isset($this->switchMany[$group][$value]) ? $this->switchMany[$group][$value] : 0;
        $this->pass($key, $field);
    }

    /**
     * @throws InvalidArgumentException
     */
    private function validateSwitched()
    {
        foreach ($this->switched as $k => $v)
            if ($v == 0)
                $this->fail("The [$k] Cannot Pass The Validation.");
    }

    /**
     * @throws InvalidArgumentException
     */
    private function validateUnique()
    {
        foreach ($this->unique as $k => $v) {
            if ($v > 1)
                $this->fail("The Group [$k] Can Only Contain One Value.");
        }
    }

    /**
     * @throws InvalidArgumentException
     */
    private function validateSwitchMany()
    {
        if (!empty($this->switchMany))
            foreach ($this->switchMany as $k => $v) {
                $hasKey = false;
                //每个项目的第一级
                //要么空，要么全有值，一个为空则另一个不可为空
                foreach ($v as $key => $item) {
                    if ($key == 'common')
                        continue;
                    foreach ($v['common'] as $vv) {
                        if ($hasKey)
                            throw new InvalidArgumentException("参数组{$k}互斥，不可同时传递");
                        if (in_array($vv, $item) && $item != 0) {
                            foreach ($vv as $value) {
                                if ($value == 0)
                                    throw new InvalidArgumentException("在参数组{$k}中，多个参数必须同时传递");
                            }
                            $hasKey = true;
                        }
                    }
                }
            }
    }

}