<?php
declare(strict_types=1);

spl_autoload_register(function (string $class): void {

    $prefix = 'App\\';
    $baseDir = realpath(__DIR__ . '/../src');

    if ($baseDir === false) {
        throw new RuntimeException("Le dossier src est introuvable.");
    }

    $baseDir .= DIRECTORY_SEPARATOR;

    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));

    $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
        return;
    }

    throw new RuntimeException("Classe non trouvée : $class");
});

use App\Entity\Filiere;
use App\Entity\Etudiant;
use App\Entity\Enseignant;
use App\Service\PrinterService;

$fInfo = new Filiere(1, "mathematique");

$e1 = new Etudiant(null, "hiba", "hiba@example.com", $fInfo);
$e2 = new Etudiant(null, "hajar", "hajar@example.com", $fInfo);

$ens1 = new Enseignant(null, "Dr Nabil", "Nabil@example.com", "Maitre de conferences");

$personnes = [$e1, $e2, $ens1];

$printer = new PrinterService();
$printer->printLabels($personnes);

echo PHP_EOL . "Export tableau (exemple) :" . PHP_EOL;
print_r($e1->toArray());
print_r($ens1->toArray());
