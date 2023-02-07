<?php

interface IModel
{
    function get();
    function create();
    function update();
    function delete();
    function find($id);
}