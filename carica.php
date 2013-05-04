<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>This is Cane's super-awesome files uploader</h1>
        <h2>Thank you for your upload!</h2>
        <?php
            // Se non ci sono stati errori nell'upload
            if ($_FILES['carica_file']['error'] == 0) {
                // Copio il file dalla cartella temporanea a quella definitiva
                copy($_FILES['carica_file']['tmp_name'], 'files_caricati/'.$_FILES['carica_file']['name'])
                        or die('Caricamento del file impossibile');
                echo "Caricamento file completato con successo.</br>";
                echo "Nome file: ".$_FILES['carica_file']['name']."</br>";
                echo "Dimensione: ".$_FILES['carica_file']['size']." byte</br>";
                
                // --- Aggiungere il file caricato al db ---
                $nome_file = $_FILES['carica_file']['name'];
                $dimensione_file = $_FILES['carica_file']['size'];
                $nome_host = 'localhost';
                //$nome_host = '/usr/local/mysql/data/localhost';
                $nome_user = 'paul';
                $password = 'up_db_4';
                $nome_db = 'matt_update';
                // PROBLEMA: non riesco a connettermi all'host...
                $connessione = @mysql_connect($nome_host, $nome_user, $password) or die('Impossibile connettersi al host');
                $selezione_db = mysql_selectdb($nome_db, $connessione) or die("Unable to select database");
                $query_inserimento = mysql_query("insert into up_files
                    (file_name, file_size) values(".$nome_file.", ".$dimensione_file.");"
                        );
                
                mysql_close() or die('impossibile chiudere la connessione al db.');
            }
            // Ci sono stati errori nell'upload
            else {
                // File troppo grande ( > del valore del parametro MAX_FILE_SIZE )
                if ($_FILES['carica_file']['error'] == UPLOAD_ERR_FORM_SIZE)
                    die("Il file non è stato caricato perché troppo grande.");
                else
                    die("Errore generico. File non caricato.");
            }
        ?>
        
        <p>Perché non <a href='index.php'>riprovare</a>?!</p>
        <p>
            (forse dovrei decidere se scrivere tutto il sito in inglese
            o tutto in italiano...)
        </p>
        
    </body>
</html>



