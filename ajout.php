<?php 
require_once('initialize.php');
if($idcom=connexpdo("dating", "myparams"));
?>

<form action="ajout.php" method="post">
  <!-- 1er groupe -->
  <fieldset>
    <legend>Vos coordonnées</legend>
    <table>
      <tbody>
        <tr>
          <td>Nom:</td>
          <td><input type="text" name="nom" size="30"></td>
        </tr>
        <tr>
          <td>Prénom:</td>
          <td><input type="text" name="prenom" size="30"></td>
        </tr>
        <tr>
          <td>Département:</td>
          <td><input type="text" name="departement" size="30"></td>
        </tr>
        <tr>
          <td>Mail:</td>
          <td><input type="mail" name="email" size="30"></td>
        </tr>
      </tbody>
    </table>
  </fieldset>
  <!-- 2ieme groupe -->
  <fieldset>
  <legend>Vos pratiques sportives</legend>
  <table>
    <tbody>
      <!-- selection des sports -->
      <tr>
        <td>Sport pratiqué:</td>
        <td>
          <select name="designation">
            <option value="NULL">Choisissez le sport !</option>;
            <?php 
            // creation dynamique de la liste de séléction
            //connexion 
            // lire la table sport
            $requete = "SELECT id_sport , designation FROM sport ORDER BY designation";
            $result = $idcom->query($requete);
            if($result){
              while($row = $result->fetch()) {
                echo '<option value='.$row[0].'>'.$row[1].'</option>';
              }
            }
          
            ?>
          </select>
          OU : ajouter un sport à la liste <input type="text" name="nomsport" size="30" />
          <input type="submit" name="ajout" value="ajouter" />
        </td>
      </tr>
      <tr>
        <td>Niveau:</td>
        <td>
          <select name="niveau" >
            <option value="1">Débutant</option>
            <option value="2">Confirmé</option>
            <option value="3">Pro</option>
            <option value="4">Supporter</option>
          </select>
        </td>
      </tr>
      <td>
        <input type="submit" name="envoie" value="Envoyer" />
      </td>
      <td>
        <input type="reset" name="efface" value="Effacer" />
      </td>
    </tbody>
  </table>
  </fieldset>
</form>

<?php 
  // $id_sport = $_POST['designation'];
  // $niveau = $_POST['niveau'];
if(isset($_POST['ajout'])){
  $req_sport = "INSERT INTO sport (id_sport,designation) VALUES (NULL, '".$_POST['nomsport']."')";
  if ($idcom->query($req_sport)) {
    echo "<div> DONNEES INSEREES dans la table pratique </div>";
 }
}
