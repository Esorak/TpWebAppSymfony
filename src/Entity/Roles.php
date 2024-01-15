<?php 

namespace App\Entity;

enum Roles : string
{
    case USER = 'ROLE_USER';
    case ADMIN = 'ROLE_ADMIN';
    case SUPER_ADMIN = 'ROLES_SUPER_ADMIN';
}