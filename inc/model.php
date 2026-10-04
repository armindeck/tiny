<?php // Provided by Armindeck: https://github.com/armindeck/tiny

namespace inc;

class Model {
  protected function read(string $file): array {
    return readJson($file);
  }

  protected function write(string $file, array $data): bool {
    return writeJson($file, $data);
  }
}

class Translate {
  private $model;
  
  public function __construct(
    private string $lang,
    private array $data_languages
  )
  {
    $this->model = new Model;
  }

  public function get(string $key){
    return $this->data_languages[$key][$this->lang] ?? $key;
  }
}

class Config {
  private $model;
  
  public function __construct(
    private array $data_config
  )
  {
    $this->model = new Model;
  }

  public function getAll(){
    return $this->data_config ?? [];
  }

  public function get(string $key){
    return $this->data_config[$key] ?? $key;
  }
}