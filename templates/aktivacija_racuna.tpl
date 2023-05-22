<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<h1 class="naslov-o-autoru">Aktivacija računa</h1>
<main>
      <div style="min-height:30rem;">
      <div style="border: 2px solid #000; padding:2rem;">
      <form id="form3" method="POST" name="form3" novalidate>
                <label for="email">Email adresa: </label>
                <input type="email" id="email" name="email" size="50" placeholder="naziv@nazivposluzitelja.xxx" required="required"><br />
                <label for="aktivacijski kod">Aktivacijski kod: </label>
                <input type="text" id="aktivacijskikod" name="aktivacijskiKod" size="50" placeholder="aktivacijski kod" required="required" /><br />
                <input id="submit2" type="submit" value="Aktiviraj " name="aktivirajButton" style="display: flex; flex-direction: column; justify-items: center;"/>
                {if isset($poruka)} 
                  <p style='color: red'>{$poruka}</p>
                {/if}
              </form>
      </div>
    </div>
    </main>