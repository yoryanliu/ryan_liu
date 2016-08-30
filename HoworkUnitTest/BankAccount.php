<?php
/**
 * 功能:
 * 獲取銀行帳戶餘額
 * 設定帳戶餘額
 * 存款
 * 提款
 *
 * 限制:
 * 餘額初始值為0
 * 餘額不能為負數
 *
 * 類別單元測試
 * phpstorm 列出測試涵蓋率
 */
class BankAccount{

    var $accountBalance = 0;

    /**
     * 獲取銀行帳戶餘額
     */
    function getAccountBalance(){
        return $this->accountBalance;
    }

    /**
     * 設定帳戶餘額
     */
    function setAccountBalance( $money ){
        $this->accountBalance = $money;
        return;
    }

    /**
     * 存款
     */
    function saveMoney( $money ){
        $this->accountBalance += $money;
        return;
    }

    /**
     * 提款
     */
    function pickUpMoney( $money ){
        $this->accountBalance -= $money;
        if ( $this->accountBalance < 0 ){
            $this->accountBalance = 0;
        }
        return;
    }
}