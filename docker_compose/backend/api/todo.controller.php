<?php
require_once("todo.class.php");

class TodoController {
    private const PATH = __DIR__."/todo.json";
    private array $todos = [];
    private mysqli $DatabaseObj;

    public function __construct() {
        $this->DatabaseObj = new mysqli("database", "root", "secret", "todos");

        if ($this->DatabaseObj->connect_error) {
            error_log("Connection failed: ".$this->DatabaseObj->connect_error);
            throw new Exception("Connection failed: ".$this->DatabaseObj->connect_error);
        } else {
            error_log("Connected successfully");
        }

        $dataArray = $this->loadAll();


        foreach ($dataArray as $data) {
            if (isset($data->id) && isset($data->title))
                $this->todos[] = new Todo($data->id, $data->title, $data->description, $data->done);
        }
    }

    public function loadAll() : array {
        $result = $this->DatabaseObj->query("SELECT * FROM todo");
        $todos = [];
        while ($row = $result->fetch_assoc()) {
            $todos[] = new Todo(
                $row["id"],
                $row["title"],
                $row["description"],
                $row["done"]
            );
        }

        return $todos;
    }

    public function load(string $id) : Todo|bool {
        $result = $this->DatabaseObj->query("SELECT * FROM todo WHERE id = $id");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Todo(
                $row["id"],
                $row["title"],
                $row["description"],
                $row["done"]
            );
        }
        return false;
    }

    public function create(Todo $todo) : bool {
        $DoneInt = $todo->done ? 1 : 0;
        return $this->DatabaseObj->query("INSERT INTO todo (id, title, description, done) VALUES ('".$todo->id."', '".$todo->title."', '".$todo->description."', '".$DoneInt."')");
    }

    public function update(string $id, Todo $todo) : bool {
        $DoneInt = $todo->done ? 1 : 0;
        return $this->DatabaseObj->query("UPDATE todo SET title = '".$todo->title."', description = '".$todo->description."', done = '".$DoneInt."' WHERE id = '$id'");
    }

    public function delete(string $id) : bool {
        return $this->DatabaseObj->query("DELETE FROM todo WHERE id = '$id'");
    }


}