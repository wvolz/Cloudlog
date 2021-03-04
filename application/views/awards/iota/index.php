
<div class="container">
    <h2><?php echo $page_title; ?></h2>

    <form class="form" action="<?php echo site_url('awards/iota'); ?>" method="post" enctype="multipart/form-data">
        <fieldset>

            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group row">
                <div class="col-md-2 control-label" for="checkboxes">Deleted IOTA</div>
                <div class="col-md-10">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="includedeleted" id="includedeleted" value="1" <?php if ($this->input->post('includedeleted') || $this->input->method() !== 'post') echo ' checked="checked"'; ?> >
                        <label class="form-check-label" for="includedeleted">Include deleted</label>
                    </div>
                </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group row">
                <div class="col-md-2" for="checkboxes">Worked / Confirmed</div>
                <div class="col-md-10">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="worked" id="worked" value="1" <?php if ($this->input->post('worked') || $this->input->method() !== 'post') echo ' checked="checked"'; ?> >
                        <label class="form-check-label" for="worked">Show worked</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="confirmed" id="confirmed" value="1" <?php if ($this->input->post('confirmed') || $this->input->method() !== 'post') echo ' checked="checked"'; ?> >
                        <label class="form-check-label" for="confirmed">Show confirmed</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="notworked" id="notworked" value="1" <?php if ($this->input->post('notworked') || $this->input->method() !== 'post') echo ' checked="checked"'; ?> >
                        <label class="form-check-label" for="notworked">Show not worked</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Continents</div>
                <div class="col-md-10">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="Antarctica" id="Antarctica" value="1" <?php if ($this->input->post('Antarctica') || $this->input->method() !== 'post') echo ' checked="checked"'; ?> >
                        <label class="form-check-label" for="Antarctica">Antarctica</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input"  type="checkbox" name="Africa" id="Africa" value="1" <?php if ($this->input->post('Africa') || $this->input->method() !== 'post') echo ' checked="checked"'; ?> >
                        <label class="form-check-label" for="Africa">Africa</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input"  type="checkbox" name="Asia" id="Asia" value="1" <?php if ($this->input->post('Asia') || $this->input->method() !== 'post') echo ' checked="checked"'; ?> >
                        <label class="form-check-label" for="Asia">Asia</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input"  type="checkbox" name="Europe" id="Europe" value="1" <?php if ($this->input->post('Europe') || $this->input->method() !== 'post') echo ' checked="checked"'; ?> >
                        <label class="form-check-label" for="Europe">Europe</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input"  type="checkbox" name="NorthAmerica" id="NorthAmerica" value="1" <?php if ($this->input->post('NorthAmerica') || $this->input->method() !== 'post') echo ' checked="checked"'; ?> >
                        <label class="form-check-label" for="NorthAmerica">North America</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input"  type="checkbox" name="SouthAmerica" id="SouthAmerica" value="1" <?php if ($this->input->post('SouthAmerica') || $this->input->method() !== 'post') echo ' checked="checked"'; ?> >
                        <label class="form-check-label" for="SouthAmerica">South America</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input"  type="checkbox" name="Oceania" id="Oceania" value="1" <?php if ($this->input->post('Oceania') || $this->input->method() !== 'post') echo ' checked="checked"'; ?> >
                        <label class="form-check-label" for="Oceania">Oceania</label>
                    </div>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group row">
                <label class="col-md-2 control-label" for="band">Band</label>
                <div class="col-md-2">
                    <select id="band2" name="band" class="form-control">
                        <option value="All" <?php if ($this->input->post('band') == "All" || $this->input->method() !== 'post') echo ' selected'; ?> >Every band</option>
                        <?php foreach($worked_bands as $band) {
                            echo '<option value="' . $band . '"';
                            if ($this->input->post('band') == $band) echo ' selected';
                            echo '>' . $band . '</option>'."\n";
                        } ?>
                    </select>
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group row">
                <label class="col-md-2 control-label" for="button1id"></label>
                <div class="col-md-10">
                    <button id="button2id" type="reset" name="button2id" class="btn btn-warning">Reset</button>
                    <button id="button1id" type="submit" name="button1id" class="btn btn-primary">Show</button>
                </div>
            </div>

        </fieldset>
    </form>
    <?php
    $i = 1;
    if ($iota_array) {
        echo '
                
                <table style="width:100%;" class="table table-sm tableiota table-bordered table-hover table-striped table-condensed text-center">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>IOTA</td>
                        <td>Prefix</td>
                        <td>Name</td>';
        if ($this->input->post('includedeleted') || $this->input->method() !== 'post')
            echo '      <td>Deleted</td>';

        foreach($bands as $band) {
            echo '<td>' . $band . '</td>';
        }
        echo '</tr>
                    </thead>
                    <tbody>';
        foreach ($iota_array as $iota => $value) {
            echo '<tr>
                            <td>'. $i++ .'</td>
                            <td>'. $iota .'</td>';
            foreach ($value  as $key) {
                echo '<td>' . $key . '</td>';
            }
            echo '</tr>';
        }

        echo '</table>
        <h2>Summary</h2>

        <table class="table-sm tablesummary table table-bordered table-hover table-striped table-condensed text-center">
        <thead>
        <tr><td></td>';

        foreach($bands as $band) {
            echo '<td>' . $band . '</td>';
        }
        echo '<td>Total</td></tr>';

        echo '</thead>
        <tbody>

        <tr><td>Total worked</td>';

        foreach ($iota_summary['worked'] as $dxcc) {      // Fills the table with the data
            echo '<td style="text-align: center">' . $dxcc . '</td>';
        }

        echo '</tr><tr>
        <td>Total confirmed</td>';
        foreach ($iota_summary['confirmed'] as $dxcc) {      // Fills the table with the data
            echo '<td style="text-align: center">' . $dxcc . '</td>';
        }

        echo '</tr>
        </table>
        </div>';

    }
    else {
        echo '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Nothing found!</div>';
    }
    ?>
</div>
