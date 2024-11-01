<?php

class Todo {
    public function __construct(
        public string $id, 
        public string $title, 
        public string $description = '',
        public bool $done = false
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->done = $done;
    }

    public function getId() : string {
        return $this->id;
    }

    public function getTitle() : string {
        return $this->title;
    }

    public function getDescription() : string {
        return $this->description;
    }

    public function getDone() : bool {
        return $this->done;
    }

    public function getArray() : array {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "done" => $this->done
        ];
    }
}