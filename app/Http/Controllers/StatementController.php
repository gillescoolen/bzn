<?php


namespace App\Http\Controllers;


use App\Http\Resources\StatementResource;
use App\Municipality;
use App\Statement;

class StatementController extends Controller
{
    public function allStatements() {
        $statements = Statement::all();
        return StatementResource::collection($statements);
    }

    public function getStatement(Statement $statement) {
        return StatementResource::make($statement);
    }
}
