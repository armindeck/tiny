<?php // Provided by Armindeck: https://github.com/armindeck/tiny

namespace inc;

class Model {
  protected string $file_core = "core";
  protected string $file_config = "config";
  protected string $file_languages = "lang";
  
  protected function read(string $file): array {
    return readJson($file);
  }

  protected function write(string $file, array $data): bool {
    return writeJson($file, $data);
  }
}

class Core extends Model {
  private array $data;
  public function __construct()
  {
    $this->data = $this->read($this->file_core) ?? [];
  }

  public function getAll(){
    return $this->data;
  }

  public function get(string $key){
    return $this->data[$key] ?? $key;
  }
}

class Config extends Model {
  private array $data;  
  public function __construct()
  {
    $this->data = $this->read($this->file_config) ?? [];
  }

  public function getAll(){
    return $this->data;
  }

  public function get(string $key){
    return $this->data[$key] ?? $key;
  }
}

class Translate extends Model {
  private array $data;
  
  public function __construct(private string $lang)
  {
    $this->data = $this->read($this->file_languages) ?? [];
  }

  public function getAll(){
    return $this->data;
  }

  public function get(string $key){
    return $this->data[$key] ?? $key;
  }

  public function t(string $key){
    return $this->data[$key][$this->lang] ?? $key;
  }
}