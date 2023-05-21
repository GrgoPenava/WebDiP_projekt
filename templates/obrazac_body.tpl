<main>
    <section class="centeredsection" style="height: 45rem;">
      <div class="obrazacapsolutan">
        <p class="dodavanjenoveporuke">Dodavanje nove poruke</p>
        {if isset($porukaGreske)}
        <p class="dodavanjenoveporuke" style="color:red;">{$porukaGreske}</p>
        {/if}
        {if isset($porukaUspjeha)}
        <p class="dodavanjenoveporuke" style="color:green;">{$porukaUspjeha}</p>
        {/if}
        <form id="obrazacForm" method="post" name="obrazacForm" action="../obrasci/obrazac.php" novalidate>
          <fieldset>
            <legend>Adrese:</legend>
            <label for="posiljatelj">Pošiljatelj: </label>
            <input type="email" id="posiljatelj" name="posiljatelj" placeholder="naziv@nazivposluzitelja.xxx" value={$posiljateljIzPrijave} required="required" /><br />
            <label for="primatelj">Primatelj: </label>
            <input type="email" id="primatelj" name="primatelj" placeholder="naziv@nazivposluzitelja.xxx" required="required" /><br />
            <label for="naslov">Naslov: </label>
            <input type="naslov" id="naslov" name="naslov" required="required" /><br />
          </fieldset>
          <fieldset>
            <legend>Poruka:</legend>
            <label for="pristigla">Kategorija poruke: </label>
            <input type="checkbox" id="pristigla" name="pristigla" checked />
            <label for="pristigla">pristigla </label>
            <input type="checkbox" id="poslana" name="poslana" />
            <label for="poslana">poslana </label>
            <input type="checkbox" id="nacrt" name="nacrt" />
            <label for="nacrt">nacrt</label>
            <input type="checkbox" id="smece" name="smece" />
            <label for="smece">smeće</label>
            <input type="checkbox" id="nezeljena" name="nezeljena" checked />
            <label for="nezeljena">neželjena</label>
            <input type="checkbox" id="vazno" name="vazno" />
            <label for="vazno">važno</label><br />
            <div class="sadrzajdiv">
              <label for="sadrzaj">Sadržaj:</label>
              <textarea id="sadrzaj" name="sadrzaj" rows="5" required="required"></textarea>
            </div>
            <br />
            <label for="broj">Kontakt:</label>
            <input type="tel" id="broj" name="broj" required="required" />
            <br />
            <label for="url">URL:</label>
            <input type="url" id="url" name="url" required="required" />
            <br />
            <input id="submit" name="submitObrasca" type="submit" value="Pošalji"  />
          </fieldset>
        </form>
      </div>
    </section>
  </main>
