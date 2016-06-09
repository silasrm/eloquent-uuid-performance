<?php
namespace App\Connection;

class ResolverDynamic implements \Illuminate\Database\ConnectionResolverInterface
{
    protected $connection;
    protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function connection($name = null)
    {
        if (isset($this->connection)) {
            return $this->connection;
        }

        return $this->connection = new \Illuminate\Database\SQLiteConnection(new \PDO('sqlite:' . $this->filename));
    }

    public function getDefaultConnection()
    {
        return 'default';
    }

    public function setDefaultConnection($name)
    {
        //
    }
}