<?php
$userAmount = readline("Amount: ");
$userInputCurrency = readline("enter the currency of your choice:");
$toCurrency = readline("Enter the currency to convert to:");
$data = file_get_contents('https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/'.$userInputCurrency.'.json');
$data = json_decode($data, true);
$rates = $data[$userInputCurrency];
function convertCurrency($amount, $toCurrency, $rates)
{
    if (isset($rates[$toCurrency])) {
        return $amount * $rates[$toCurrency];
    } else {
        exit("Invalid currency: $toCurrency");
    }
}
$converted_amount = convertCurrency($userAmount, $toCurrency, $rates);
echo "$userAmount $userInputCurrency = $converted_amount $toCurrency\n";

