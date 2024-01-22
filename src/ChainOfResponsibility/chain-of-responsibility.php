<?php declare(strict_types=1);

require '../../vendor/autoload.php';

use DesignPatterns\ChainOfResponsibility\Contractors\Contractor;
use DesignPatterns\ChainOfResponsibility\ContractorValidation;
use DesignPatterns\ChainOfResponsibility\Validations\Chain\{
    CityValid,
    NameValid,
    NumberAccountBankValid,
    TaxIDValid
};


$contractor = new Contractor('P', 'N', 166303540, 'PL9721205006411130137165094', 'DBM');
$contractorValidation = new ContractorValidation($contractor);

$validateChain = new NameValid();
$validateChain->set(new CityValid())
    ->set(new TaxIDValid(true))
    ->set(new NumberAccountBankValid());

$contractorValidation->set($validateChain);

$messages = $contractorValidation->check();

?>

<ul>
    <?php foreach ($messages as $message): ?>
        <li><?= $message ?></li>
    <?php endforeach; ?>
</ul>



