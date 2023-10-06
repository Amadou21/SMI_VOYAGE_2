<!-- Le menu de navigation et la search bar de la page-->
<section id="navwrapper" class="hoc clear"  style="margin-bottom:0px;"> 
  <!-- Les iconnes du contact jusqua la barre de recherche -->
  <nav id="mainav">
    <ul class="clear">
      <li class="active"><a href="../index.php">Acceuil</a></li>
      <li><a class="drop" href="#">Pays</a>
          <ul>
            <li><a href="liste.php?pa=Maroc&cat=0&vil=0&dat=0">Maroc</a></li>
            <li><a href="liste.php?pa=Mali&cat=0&vil=0&dat=0">Mail</a></li>
            <li><a href="liste.php?pa=Turquie&cat=0&vil=0&dat=0">Turquie</a></li>
            <li><a href="liste.php?pa=France&cat=0&vil=0&dat=0">France</a></li>  
          </ul>
      </li>
      <li><a class="drop" href="#">Categorie</a>
          <ul>
            
            <li><a href="liste.php?pa=0&cat=Balneaire&vil=0&dat=0">Balneaire</a></li>
            <li><a href="liste.php?pa=0&cat=Ete&vil=0&dat=0">Eté</a></li>
            <li><a href="liste.php?pa=0&cat=hiver&vil=0&dat=0">Hiver</a></li>
            <li><a href="liste.php?pa=0&cat=Voyage de noce&vil=0&dat=0">Lune de miel</a></li>
            <li><a href="liste.php?pa=0&cat=Familliale&vil=0&dat=0">Familliale</a></li>
          </ul>
      </li>  
    <li><a href="liste.php?pa=0&cat=0&vil=0&dat=0">Liste de toutes nos offres</a></li>
    <li><a href="liste.php?pa=0&cat=promotion&vil=0&dat=0">Liste des promotion</a></li>
    </ul>
  </nav>
</section>
<section style="margin-bottom:5px"> 
<div class="search_zone">
  <h2 style=" text-align:center ; color:aliceblue; top:50px; letter-spacing: 2px; font-size: 60px;">Reserver en toute <br> simplicite</h2>
  <form action="liste.php" class="search_form">
    <input type="text" placeholder="Destination" id="" name="pa" style="color:black; font-size: 17px;" required>
    <input type="text" placeholder="Ville de départ" id="" name="vil" style="color:black; font-size: 17px;" required>
    <input type="date" placeholder="Date de depart" id="" name="dat" style="color:black; font-size: 17px; width: 200px;" required>
    <select name='cat'>
      <option value="Balneaire" name="tout" >Tout</option>
       <option value="Balneaire" name="cat" >Balneaire</option>
       <option value="Hiver" name="cat">Hiver</option>
       <option value="Ete" name="cat">Eté</option>
       <option value="Familliale" name="cat">Familliale</option>
       <option value="Noce" name="cat">Noce</option>
    </select>
    <button type="submit">Rechercher</button>
</form>
</div>
</section>   
<style>
  .search_zone{
    height:250px;
    margin-top: 70px;
    border:2px solid #37AE6A;
    border-radius: 15px;
    background-image: url('images/demo/rech.JPG');
    background-size: cover;
    background-position-y:-200px ;
    background-color: (256, 256, 256, 75%);
    background: linear-gradient(rgba(0,0,0,0.50), rgba(0,0,0,0.7));
}
.search_form{
    display: flex;
    margin-top: 65px;
    margin-left: 30px;
    margin-right: 30px;
    justify-content: space-evenly;

}
.search_form>input{
    height: 40px;
    border-radius: 10px;
    border: 1px solid #37AE6A;
    padding: 5px;
}
.search_form>select{
    height: 40px;
    border-radius: 10px;
    border: 1px solid #37AE6A;
    padding: 5px;
    color:black;
    width: 200px;
    font-size: 17px;
}
.search_form>button{
    font-weight: bold;
    border-radius: 10px;
    border: 1px solid #37AE6A;
    background-color:#37AE6A;
    backdrop-filter: blur(5px);
    width: 130px;
}
.search_form>button:hover{
    background-color: #37AE6A;
    color:white;
}
</style>