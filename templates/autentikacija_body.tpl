<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<main>
      <div class="autentikacijaclass" style="height: 25rem;">
        <section class="autentikacija" style="margin-top: 4rem;">
          <div class="registracijaiprijava">
            <div class="registracija">
              <form id="form2" method="post" name="form2" action="" novalidate>
                <label for="imeprezime" {$imeprezimeboja}>Ime i prezime: </label>
                <input type="text" id="imeprezime" name="imeprezime" maxlength="30" placeholder="Ime i prezime" required="required" />
                <br />
                {if isset($imeprezimeprovjera) && strlen($imeprezimeprovjera)>2}
                <label style="color:red; font-size:15px;">{$imeprezimeprovjera}<label>
                <br />
                {/if}
                <label for="email" {$emailboja} >Email adresa: </label>
                <input type="email" id="email" name="email" size="30" maxlength="50" placeholder="naziv@nazivposluzitelja.xxx" required="required" onblur="checkEmail()" /><br />
                {if isset($emailprovjera) && strlen($emailprovjera)>2}
                <label style="color:red; font-size:15px;">{$emailprovjera}<label>
                <br />
                {/if}
                <label for="spol" style="color:black;">Spol: </label>
                <select name="spol" id="spol">
                  <option value="musko">Muško</option>
                  <option value="zensko">Žensko</option>
                </select>
                <br />
                <label for="lozinka" {$lozinkaboja}>Lozinka: </label>
                <input type="password" id="lozinka" name="lozinka" pattern=".{5}" placeholder="lozinka" required="required" /><br />
                {if isset($lozinkaprovjera) && strlen($lozinkaprovjera)>2}
                <label style="color:red; font-size:15px;">{$lozinkaprovjera}<label>
                <br />
                {/if}
                <label for="potvrdalozinke" {$potvrdiboja}>Potvrdi lozinku: </label>
                <input type="password" id="potvrdalozinke" name="potvrdalozinke" pattern=".{5}" placeholder="potvrdi lozinku" required="required" /><br />
                {if isset($potvrdaprovjera) && strlen($potvrdaprovjera)>2}
                <label style="color:red; font-size:15px;">{$potvrdaprovjera}<label>
                <br />
                {/if}
                <input id="submit" type="submit" value="Registriraj se " name="registracijaButton" />
                {if isset($poruka_registracija)}
                  <p style='color: red; text-align: center;'>{$poruka_registracija}</p>
                {/if}
              </form>
            </div>
            <div class="prijava">
              <form id="form3" method="POST" name="form3" novalidate>
                <label for="email">Email adresa: </label>
                <input type="email" id="email2" name="email" size="30" placeholder="naziv@nazivposluzitelja.xxx" required="required" "/><br />
                <label for="lozinka">Lozinka: </label>
                <input type="password" id="lozinka2" name="lozinka" size="30" placeholder="lozinka" required="required" /><br />
                <input id="submit2" type="submit" value="Prijavi se " name="prijavaButton" />
                {if isset($poruka)} 
                  <p style='color: red'>{$poruka}</p>
                {/if}
                <p style="font-size: small;">Administrator = gpenava@student.foi.hr - grgopenava</p>
                <p style="font-size: small;">Moderator = markomarkovic@gmail.com - markomarkovic</p>
                <p style="font-size: small;">Korisnik = anaanic@gmail.com - anaanic0</p>
              </form>
            </div>
          </div>
        </section>
      </div>
    </main>

<script type="text/javascript">
  function checkEmail() {
    let email = document.getElementById('email').value;
    $.ajax({
                url: '../privatno/email_provjera.php',
                type: 'POST',
                dataType: 'json',
                data: { email: email },
                success:function(result){
                console.log(result.pronaden_email);
                if(result.pronaden_email === true){
                alert("Email adresa je već zauzeta");
                document.getElementById('email').value = null;
                }
            }
            });
  }
</script>