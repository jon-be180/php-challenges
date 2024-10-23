<?php

namespace Challenge;

class MaskCreditCard {
    
    /**
     * Returns a masked credit card number, removing all but the first and last four digits.
     * 
     * If non-numeric characters are found in the credit card number, they are ignored.
     * 
     * @param string $creditCard
     * @return string
     * 
     */
    public static function apply(string $creditCard): string {

        if (empty($creditCard)) {
            return '';
        }

        if (strlen($creditCard) < 6) {
            return $creditCard;
        }

        $creditCardOnlyNumbers = preg_replace('/[^0-9]/', '', $creditCard);
        $creditCardOnlyNumbersLength = strlen($creditCardOnlyNumbers);

        $maskedCreditCard = '';
        $maskedCreditCardOnlyNumbersLength = 0;
        for ($i = 0; $i < strlen($creditCard); $i++) {

            if (!is_numeric($creditCard[$i])) {
                $maskedCreditCard .= $creditCard[$i];
                continue;
            }
            
            if ($maskedCreditCardOnlyNumbersLength === 0 || ($maskedCreditCardOnlyNumbersLength >= ($creditCardOnlyNumbersLength - 4))) {
                $maskedCreditCard .= $creditCard[$i];
                $maskedCreditCardOnlyNumbersLength++;
                continue;
            }

            $maskedCreditCard .= '#';
            $maskedCreditCardOnlyNumbersLength++;
        }

        return $maskedCreditCard;

    }

}