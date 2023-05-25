<main>
    <section class="centeredsection" style="height: 50rem;">
      <div style="margin-top:5rem;">
        <p class="dodavanjenoveporuke">Uređivanje proizvoda</p>
        {if isset($porukaGreske)}
        <p class="dodavanjenoveporuke" style="color:red;">{$porukaGreske}</p>
        {/if}
        {if isset($porukaUspjeha)}
        <p class="dodavanjenoveporuke" style="color:green;">{$porukaUspjeha}</p>
        {/if}
        <form id="kreirajKampanju" method="post" name="urediProizvod" action="" novalidate>
          <fieldset>
            <legend>Proizvod:</legend>
            <label for="bodovizakupovinu">Bodovi za kupovinu (koje korisnik dobije): </label>
            <input type="text" id="bodovizakupovinu" name="bodovi_za_kupovinu" placeholder="5" required="required" oninput="provjera()" {if isset($proizvodZaUrediti["bodovi_za_kupovinu"])} value="{$proizvodZaUrediti["bodovi_za_kupovinu"]}"{/if} /><br />
            <label for="cijena_u_bodovima">Cijena u bodovima: </label>
            <input type="text" id="cijena_u_bodovima" name="cijena_u_bodovima" placeholder="50" required="required" oninput="provjera()" {if isset($proizvodZaUrediti["cijena_u_bodovima"])} value="{$proizvodZaUrediti["cijena_u_bodovima"]}"{/if} /><br />
            <input type="hidden" name="ID_proizvod" value="{$proizvodZaUrediti["ID_proizvod"]}">
            <div style="display:flex; justify-items:center;">
            <input id="submit" name="urediProizvod" type="submit" value="Uredi" style="cursor:pointer;"  />
            </div>
          </fieldset>
        </form>
      </div>
    </section>
  </main>

<script type="text/javascript">

function provjera(){
  let uredi = document.getElementById('submit');
    if(provjeriBodoviZaKupovinu() && provjeriCijenaUbodovima()){
      uredi.disabled = false;
    }else{
      uredi.disabled = true;
    }
}

function provjeriBodoviZaKupovinu(){
  let naziv = document.getElementById('bodovizakupovinu').value;
  if(naziv.length>0 && !isNaN(naziv)){
    return true;
  }else{
    return false;
  }
}

function provjeriCijenaUbodovima(){
  let naziv = document.getElementById('cijena_u_bodovima').value;
  if(naziv.length>0 && !isNaN(naziv)){
    return true;
  }else{
    return false;
  }
}
</script>