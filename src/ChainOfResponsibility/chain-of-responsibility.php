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
    ->set(new TaxIDValid())
    ->set(new NumberAccountBankValid());

$contractorValidation->set($validateChain);


?>

<ul>
    <?php if (!$contractorValidation->check()): ?>
        <?php foreach ($contractorValidation->message() as $message): ?>
            <li><?= $message ?></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>



