<?php
/**
 * Created by PhpStorm.
 * User: daddyingrave
 * Date: 15.02.16
 * Time: 18:58
 */
namespace Daddyingrave\EvilEngine\Routing;

//class Route
//{
//    protected $compiledPattern;
//    protected $controller;
//    protected $pattern;
//    protected $restrictions = [];
//
//    /**
//     * Route constructor.
//     * @param $controller
//     * @param $pattern
//     * @param array $restrictions
//     */
//    public function __construct($controller, $pattern, array $restrictions)
//    {
//
//        $this->controller = $controller;
//        $this->pattern = $pattern;
//        $this->restrictions = $restrictions;
//    }
//
//    public function compile()
//    {
//        if ($this->compiledPattern) {
//            return $this->compiledPattern;
//        }
//        $pairs = array_fill_keys($this->getParamNames(), '\w+');
//        $pairs = array_merge($pairs, $this->getRestrictions());
//        $replacePairs = [];
//        foreach ($pairs as $name => $rule) {
//            $replacePairs["{{$name}}"] = "(?P<$name>$rule)";
//        }
//        $this->compiledPattern = '~^' . strtr($this->getPattern(), $replacePairs) . '$~';
//        return $this->compiledPattern;
//    }
//
//    public function getParamNames()
//    {
//        preg_match_all('~{(?P<names>\w+)}~',$this->getPattern(), $matches);
//        return $matches['names'];
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getController()
//    {
//        return $this->controller;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPattern()
//    {
//        return $this->pattern;
//    }
//
//    /**
//     * @return array
//     */
//    public function getRestrictions()
//    {
//        return $this->restrictions;
//    }
//
//
//}

class Route
{
    protected $compiledPattern;
    protected $controller;
    protected $pattern;
    protected $restrictions = [];
    /**
     * @param string $pattern шаблон url-адреса.
     * @param string $controller имя контроллера.
     * @param array $restrictions ограничения на значения параметров.
     */
    public function __construct($pattern, $controller, array $restrictions = [])
    {
        $this->pattern = $pattern;
        $this->controller = $controller;
        $this->restrictions = $restrictions;
    }
    /**
     * @return string возвращает скомпилированный шаблон регулярного выражения,
     * для поиска совпадения введенного url-адреса с текущим маршрутом.
     */
    public function compile()
    {
        if ($this->compiledPattern) {
            return $this->compiledPattern;
        }
        $pairs = array_fill_keys($this->getParamNames(), '\w+');
        $pairs = array_merge($pairs, $this->getRestrictions());
        $replacePairs = [];
        foreach ($pairs as $name => $rule) {
            $replacePairs["{{$name}}"] = "(?P<$name>$rule)";
        }
        $this->compiledPattern = '~^' . strtr($this->getPattern(), $replacePairs) . '$~';
        return $this->compiledPattern;
    }
    /**
     * @return string возвращает имя контроллера.
     */
    public function getController()
    {
        return $this->controller;
    }
    /**
     * @return string возвращает шаблон url-адреса.
     */
    public function getPattern()
    {
        return $this->pattern;
    }
    /**
     * @return array возвращает ограничения на значения параметров.
     */
    public function getRestrictions()
    {
        return $this->restrictions;
    }
    /**
     * @return array возвращает массив имен параметров.
     */
    public function getParamNames()
    {
        preg_match_all('~{(?P<names>\w+)}~i', $this->getPattern(), $matches);
        return $matches['names'];
    }
}