<?php
final class Model_User extends Model_BaseModel
{
    public int $id = 0;
    public string $username = '';
    public string $password_hash = '';
}