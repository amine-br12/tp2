<?php
interface ICRUD {
    public function create($params);
    public function display();
    public function showId($id);
    public function update($id,$params);
    public function delete($id);
}