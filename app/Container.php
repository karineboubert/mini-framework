<?php
namespace App;
use ArrayAccess;
class Container implements ArrayAccess
{
    protected $items;

    public function __construct(array $items = [])
    {
        foreach ($items as $offset => $item){
            $this->offsetSet($offset, $items);
        }
    }

    public function offsetExists($offset){
        return isset($this->items[$offset]);

    }
    public function offsetGet($offset){
        if(!$this->offsetExists($offset)){
            return null;
        }
        return $this->items[$offset]($this);
    }
    public function offsetSet($offset, $value){
        $this->items[$offset] = $value;
    }
    public function offsetUnset($offset){
        if($this->has($offset)){
            unset($this->items[$offset]);
        }

    }
    public function has($offset){
        return $this->offsetExists($offset);
    }
    public function __get($offset){
        return $this->offsetGet($offset);
    }
}