<?php

interface Dao
{
    function getById($id);

    function getAll();

    function create($item);

    function delete($id);
}