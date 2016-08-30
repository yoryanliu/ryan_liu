<?php
require 'BankAccount.php';

Class BankAccountTest extends PHPUnit_Framework_TestCase {

    public static function provider() {
        return array(
            array(0, 100, 100, 100, 200, 200, 0),
            array(0, 100, 100, 100, 200, 1000, 0),

            array(0, 100, 100, 100, 200, 200, 0),
            array(0, 100, 100, 100, 200, 200, 0),
        );
    }
    /** * @dataProvider provider */
    public function testBankAccountAccess($a, $b, $c, $d, $e, $f, $g) {
        $BankAccount = new BankAccount();

        // 獲取銀行帳戶餘額 初始值為 0
        $this->assertEquals($a, $BankAccount->getAccountBalance());

        // 設定帳戶餘額
        $BankAccount->setAccountBalance( $b );
        $this->assertEquals($c, $BankAccount->getAccountBalance());

        // 存款
        $BankAccount->saveMoney( $d );
        $this->assertEquals($e, $BankAccount->getAccountBalance());

        // 提款
        $BankAccount->pickUpMoney( $f );
        $this->assertEquals($g, $BankAccount->getAccountBalance());
    }
}
