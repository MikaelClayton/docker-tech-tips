<?php
require_once("todo.class.php");

class TodoController {
    private const PATH = __DIR__."/todo.json";
    private array $todos = [];

    public function __construct() {
        $content = file_get_contents(self::PATH);
        if ($content === false) {
            throw new Exception(self::PATH . " does not exist");
        }  
        $dataArray = json_decode($content);
        if (!json_last_error()) {
            foreach($dataArray as $data) {
                if (isset($data->id) && isset($data->title))
                $this->todos[] = new Todo($data->id, $data->title, $data->description, $data->done);
            }
        }
    }

    public function loadAll() : array {
        return $this->todos;
    }

    public function load(string $id) : Todo | bool {
        foreach($this->todos as $todo) {
            if ($todo->id == $id) {
                return $todo;
            }
        }
        return false;
    }

    public function create(Todo $todo) : bool {
        $ContentStr = file_get_contents(self::PATH);
        $ContentArr = json_decode($ContentStr);

        $ContentArr[] = $todo->getArray();
        file_put_contents(self::PATH, json_encode($ContentArr, true));
        return true;
    }

    public function update(string $id, Todo $todo) : bool {
        $ContentStr = file_get_contents(self::PATH);
        $ContentArr = json_decode($ContentStr);

        foreach ($ContentArr as $KeyInt => $TodoObj) {
            if ($TodoObj->id != $id) {
                continue;
            }

            $ContentArr[$KeyInt] = $todo->getArray();
            file_put_contents(self::PATH, json_encode($ContentArr, true));
            return true;
        }

        return false;
    }

    public function delete(string $id) : bool {
        $ContentStr = file_get_contents(self::PATH);
        $ContentArr = json_decode($ContentStr);

        foreach ($ContentArr as $KeyInt => $TodoObj) {
            if ($TodoObj->id != $id) {
                continue;
            }

            unset($ContentArr[$KeyInt]);
            file_put_contents(self::PATH, json_encode(array_values($ContentArr), true));
            return true;
        }

        return false;
    }


}