<?php

namespace App\Database;

class Database
{
    protected $user;
    protected $password;
    protected $host;
    protected $nameDb;
    protected $mysqlHandle;

    /**
     * @return bool
     */
    protected function takeValues(): bool
    {
        require_once 'database.inc';

        $this->user = USER;
        $this->password = PASSWORD;
        $this->host = HOST_NAME;
        $this->nameDb = DB_NAME;

        if (empty($this->user) || empty($this->password) || empty($this->nameDb))
            return false;

        return true;
    }

    /**
     * @param string $host
     * @param string $user
     * @param $password
     * @param $nameDB
     * @return bool
     */
    protected function startConnection(string $host, string $user, $password, $nameDB): bool
    {
        $mysqliConnect = mysqli_connect($host, $user, $password);

        if (!$mysqliConnect)
            return false;

        mysqli_select_db($mysqliConnect, $nameDB);
        mysqli_set_charset($mysqliConnect, "utf8");
        mysqli_query($mysqliConnect, 'SET collation_connection = utf8_general_ci');

        $this->mysqlHandle = $mysqliConnect;

        return true;
    }

    /**
     * @param $mysqliConnect
     * @return bool
     */
    protected function closeDatabase($mysqliConnect): bool
    {
        if (!mysqli_close($mysqliConnect)) {
            return false;
        }

        return true;
    }
}
