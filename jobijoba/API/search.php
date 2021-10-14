<?php
    session_start();
    include("connect.php");
    if(isset($GET_['info'])){
        $info = (String) trim($GET_["info"]);
        $req = $DB ->query("SELECT * from ANNONCE WHERE NOM_SOCIETE LIKE ? LIMIT 10 ",array("$info%"));
        $req = $req ->fetchALL();
        foreach($req as $r){
            ?>
            <div>
                <?= $r["NOM_SOCIETE"]?>
            </div>
            <?php
        }
    };
    

?>