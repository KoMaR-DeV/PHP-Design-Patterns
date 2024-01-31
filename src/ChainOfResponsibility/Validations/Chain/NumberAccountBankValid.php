<?php

declare(strict_types=1);

namespace DesignPatterns\ChainOfResponsibility\Validations\Chain;

use DesignPatterns\ChainOfResponsibility\Interfaces\ContractorInterfaces;
use DesignPatterns\ChainOfResponsibility\Validations\Chain;

final class NumberAccountBankValid extends Chain
{
    public function check(ContractorInterfaces $contractor): bool
    {
        if (!$this->checkIBAN($contractor->getBankAccountNumber())) {
            self::$messages[] = 'Not a valid account Bank number.';

            return false;
        }

        return parent::check($contractor);
    }

    private function checkIBAN(string $iban): bool
    {
        $iban = strtoupper(str_replace(' ', '', $iban));

        if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z0-9]{1,30}$/', $iban)) {
            $country = substr($iban, 0, 2);
            $check = intval(substr($iban, 2, 2));
            $account = substr($iban, 4);

            $search = range('A', 'Z');
            foreach (range(10, 35) as $tmp) {
                $replace[] = strval($tmp);
            }
            $numstr = str_replace($search, $replace, $account . $country . '00');


            $checksum = intval(substr($numstr, 0, 1));
            for ($pos = 1; $pos < strlen($numstr); $pos++) {
                $checksum *= 10;
                $checksum += intval(substr($numstr, $pos, 1));
                $checksum %= 97;
            }

            return ((98 - $checksum) == $check);
        }
        return false;
    }
}