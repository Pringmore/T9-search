<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>T9 Search - Home Page</title>
  <link rel="stylesheet" href="assets/css/app.css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <section class="head-section">
        <div class="container">
            <header>
                <div class="presentation">
                    <h1 class="page-header">#T9 Telefonbuch</h1>
                    <i class="toggle-button" onclick="toggleNotice()">i</i>
                </div>
                <div id="info" class="hidden">
                    <h3 class="notice">Notice: Tape some numbers except 0 and 1 into the search field in order to look for names who match resp. to the series of numbers</h3>
                    <p class="notice">
                    Press button "Search" to start looking for results<br>
                        Press button "Reset" to reset the field's value</p>
                </div>
                <div class="form-container">
                     <form 
                        action="/?act=search"
                        method="post"
                        id="form"
                        name="search-form">
                        <span>Search field:</span>
                        <input type="text"
                               placeholder="Only numbers"
                               class="search-field"
                               name="number-input"
                               id="number-input"
                               type="number"><br>
                        <?php
                            if($this->_error_input)
                            echo "<span class='alert-message'>Please use NUMBERS without 0 or 1 !</span><br>";
                        ?>
                    
                        <button type="reset"
                                class="reset-button">Reset</button>
                        <button type="submit"
                                class="submit-button">Search</button>
                    </form>
                </div>
                <?if (isset($this->_stmt)) {?>
                <div class="table-container">
                    <h3 class="result-title">Search results for :
                    <?php
                        echo $_POST['number-input'];     
                    ?> 
                    </h3>
                    <table class="table-users">
                        <thead class="table-head">
                            <tr>
                                <th>Vornachmen</th>
                                <th>Nachnamen</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if ($this->_stmt->rowCount() === 0)
                        {?> 
                            <tr>
                                <td>Nobody is matching!</td>
                            <tr>          
                      <?}
                        else
                        while ($row = $this->_stmt->fetch(PDO::FETCH_ASSOC))
                        {?>
                            <tr>
                                <td><?php echo $row['vorname'];  ?></td>
                                <td><?php echo $row['nachname']; ?></td>
                            </tr>
                  <?php }?>
                        </tbody>
                    </table>
                </div> 
                <?}?>
            </header>
        </div>
    </section>
    <script src="assets/js/animation.js"></script>
</body>
</html>