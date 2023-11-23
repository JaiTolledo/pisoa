<?php


function is_logged_in()
{
    return session()->get('isLoggedIn');
}

function authtype()
{
    return 'gerencia';
    //return 'entidad';
    //return session()->get('user_type');
}

function is_rol($rol)
{   
    $roles = session()->get('roles');
    foreach ($roles as $item) {
        if ($item->rol == $rol) {
            return true;
        }
    }
    return false;
}
function auth_id()
{
    return session()->get('id');
}
function auth_ejecutora()
{
    return session()->get('ejecutora');
}
function auth_avatar()
{
   
}
function auth_verified()
{
   
}

function dark_mode()
{
   
}
