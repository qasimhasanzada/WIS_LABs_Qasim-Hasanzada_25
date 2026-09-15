<?php

class BankAccount
{
    public $ownerName;
    private $balance;

    function __construct($ownerName, $balance)
    {
        $this->ownerName = $ownerName;
        $this->balance = $balance;
    }

    function showBalance()
    {
        echo "Balance: " . $this->balance;
    }
}

$account1 = new BankAccount(
    "Ahmad",
    5000
);

echo "Owner: " . $account1->ownerName . "<br>";
$account1->showBalance();

?>