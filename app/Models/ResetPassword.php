<?php


namespace App\Models;


class ResetPassword extends BaseModel
{
    protected $table = "reset_passwords";

    protected $fillable = ["email", "token", "code", "model"];
}
