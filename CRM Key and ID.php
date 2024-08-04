<?php
session_start();
/**
 *  @package CRM Key and ID
 */
/*
Plugin Name: CRM Key and ID
Plugin URI: htttp://github.com/oleraj09/CRM
Description: A simple Plugin for API Key and ID
Version: 1.0.1
Author: DynamicFlow
Author URI: https://dynamicflowit.com/
Text Domain: CRM Key and ID
*/

if (!defined('ABSPATH')) {
    exit;
}

function stylesheet()
{
    wp_enqueue_style('style1x', plugins_url('/assets/css/style.css', __FILE__));
    wp_enqueue_script('functionjs', plugins_url('/assets/js/function.js', __FILE__), array());
}
add_action("wp_enqueue_scripts", "stylesheet");
// Register the admin menu
function crm_menu()
{
    add_menu_page('CRM Key and ID', 'CRM Key and ID', 'manage_options', 'CRM-menu-display', 'CRM', '', 30);
}
add_action('admin_menu', 'crm_menu');

function CRM()
{
    global $wpdb;
    $id = 1;
    $table_name = $wpdb->prefix . 'crm';
    $resultapi = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $id));
    $table_name = $wpdb->prefix . 'crm_radio';
    $resultradio = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $id));
    $table_name = $wpdb->prefix . 'crm_visitor';
    $resultvisitor = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name"));
    $table_name = $wpdb->prefix . 'crm_broker';
    $resultbroker = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name"));
?>
<div class="frist h-auto overflow-visible mt-5 shadow">
    <div class="bg">
        <h1 class="cf">CRM - API INTEGRATION</h1>
        <p class="ak">Get Start with API and KEY</p>
    </div>
    <div class="border">
        <div class="bgb">
            <h1 class="ins">Instruction</h1>
            <div class="ibody">
                <li>Go to your condosale account Section. Find API ID and API KEY that's look like
                    "e4172823a365483dbe72" and "e4172823a365483dbe722"
                    Copy that and past to bellow API input field.</li>
            </div>
        </div>
        <form action="" method="POST">
            <?php
            if ($resultapi) {
            ?>
            <div class="bg2" id="apis">
                <h1 class="cr">Enter Required Credential</h1>
                <?php if (isset($_SESSION['error_message'])): ?>
                <div class="error-message">
                    <?php echo $_SESSION['error_message']; ?>
                </div>
                <?php unset($_SESSION['error_message']); ?>
                <?php endif; ?>
                <div class="inputsx">
                    <input name="apiid" type="text" placeholder="Enter Your API ID" value="<?= $resultapi->apiid ?>">
                    <input name="apikey" type="text" placeholder="Enter Your API KEY" value="<?= $resultapi->apikey ?>">
                    <input type="submit" name="apisubmit" value="SUBMIT">
                </div>
            </div>
            <?php
            } else {
            ?>
            <div class="bg2">
                <h1 class="cr">Enter Required Credential</h1>
                <?php if (isset($_SESSION['error_message'])): ?>
                <div class="error-message">
                    <?php echo $_SESSION['error_message']; ?>
                </div>
                <?php unset($_SESSION['error_message']); ?>
                <?php endif; ?>
                <div class="inputsx">
                    <input name="apiid" type="text" placeholder="Enter Your API ID">
                    <input name="apikey" type="text" placeholder="Enter Your API KEY">
                    <input type="submit" name="apisubmit" value="SUBMIT">
                </div>
            </div>
            <?php
            }
            ?>
        </form>
        <hr>
        <div class="bgb" id="radio">
            <h1 class="ins">Radio Button Value</h1>
            <div class="ibody">
                <li>Gravity form Radio Button Choice Value. ex: Agent or Broker !</li>
                <li>If you Dont want any Radio Checkbox, then put "<span style="color:red; font-weight:600">None</span>"
                    in
                    Radio Value fied. And "<span style="color:red; font-weight:600">0</span>" in gravity if field.</li>
            </div>
            <form action="" method="POST">
                <?php
                if ($resultradio) {
                ?>
                <div class="bgx">
                    <h3 class="crx">Input the radio value, which you want to open condition?</h1>
                        <div class="inputsx">
                            <input name="radio" type="text" placeholder="Visitor Or Broker"
                                value="<?= $resultradio->radio ?>">
                            <input name="radioid" type="text" placeholder="Gravity form Radio Button ID"
                                value="<?= $resultradio->radioid ?>">
                            <input type="submit" value="SUBMIT">
                        </div>
                </div>
                <?php
                } else {
                ?>
                <div class="bgx">
                    <h3 class="crx">Visitor Or Broker/Agent?</h1>
                        <div class="inputsx">
                            <input name="radio" type="text" placeholder="Visitor Or Broker">
                            <input name="radioid" type="text" placeholder="Gravity form Radio Button ID">
                            <input type="submit" value="SUBMIT">
                        </div>
                </div>
                <?php
                }
                ?>
            </form>
        </div>
        <!-- Visitor Info-------- -->
        <div class="bgb" id="section-to-scroll">
            <h1 class="ins">Visitor INFO</h1>
            <div class="ibody">
                <li>Enter API KEY and Gavity form Field ID</li>
            </div>
            <form action="" method="POST">
                <?php
                if ($resultvisitor) {
                ?>

                <div class="bgx">
                    <div class="buttonsx">
                        <button type="button" class="btnadd" onclick="add3();add4();visitor1()">Add</button>
                        <button type="button" class="btnrmv hidden" id="disapear1"
                            onclick="remove3();remove4();count1()">Remove</button>
                    </div>
                    <?php if (isset($_SESSION['error_message_visitor'])): ?>
                    <div class="error-message" style="margin-top:5px">
                        <?php echo $_SESSION['error_message_visitor']; ?>
                    </div>
                    <?php unset($_SESSION['error_message_visitor']); ?>
                    <?php endif; ?>
                    <div class="inputs">
                        <div class="inputs-key">
                            <?php
                                foreach ($resultvisitor as $vis) { ?>
                            <div class="inlines">
                                <div class="flex">
                                    <input type="text" class="text" name="visitorkey<?= $vis->id ?>"
                                        value=<?= $vis->vistiorkey ?> />
                                    <input type="text" class="text" name="visitorvalue<?= $vis->id ?>"
                                        value=<?= $vis->vistiorvalue ?> />
                                </div>
                                <button type="submit" class="btnedt nf" name="visupdate"
                                    value=<?= $vis->id ?>>Update</button>
                                <button type="submit" class="btnrmv nf" name="visdeleteItem"
                                    value=<?= $vis->id ?>>Delete</button>
                            </div>
                            <?php }
                                ?>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="inputs-value" id="visitorkey">
                        </div>
                        <div class="inputs-value" id="visitorvalue">
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" id="toggle3" class="hidden" name="submit_visitor" value="SUBMIT">
                    </div>
                </div>
                <?php
                } else {
                ?>
                <div class="bgx">
                    <div class="buttonsx">
                        <button type="button" class="btnadd" onclick="add3();add4();visitor2()">Add</button>
                        <button type="button" class="btnrmv hidden" id="dis1"
                            onclick="remove3();remove4();count4()">Remove</button>
                    </div>
                    <?php if (isset($_SESSION['error_message_visitor'])): ?>
                    <div class="error-message" style="margin-top:5px">
                        <?php echo $_SESSION['error_message_visitor']; ?>
                    </div>
                    <?php unset($_SESSION['error_message_visitor']); ?>
                    <?php endif; ?>
                    <div class="inputs">
                        <div class="inputs-key" id="visitorkey">
                        </div>
                        <div class="inputs-value" id="visitorvalue">
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" id="toggle1" name="submit_visitor" class="hidden" value="SUBMIT">
                    </div>
                </div>
                <?php
                }
                ?>
            </form>
        </div>
        <!-- Agent or Broker----------- -->
        <div class="bgb" id="section-to-scrolls">
            <h1 class="ins">Agent/Broker INFO</h1>
            <div class="ibody">
                <li>Enter API KEY and Gavity form Field ID</li>
            </div>
            <form action="" method="POST">
                <?php
                if ($resultbroker) {
                ?>
                <div class="bgx">
                    <div class="buttonsx">
                        <button type="button" class="btnadd" onclick="add1();add2();broker1()">Add</button>
                        <button type="button" class="btnrmv hidden" id="disapear2"
                            onclick="remove1();remove2();count2()">Remove</button>
                    </div>
                    <?php if (isset($_SESSION['error_message_broker'])): ?>
                    <div class="error-message" style="margin-top:5px">
                        <?php echo $_SESSION['error_message_broker']; ?>
                    </div>
                    <?php unset($_SESSION['error_message_broker']); ?>
                    <?php endif; ?>
                    <div class="inputs">
                        <div class="inputs-key">
                            <?php
                                foreach ($resultbroker as $bro) { ?>
                            <div class="inlines">
                                <div class="flex">
                                    <input type="text" class="text" name="brokerkey<?= $bro->id ?>"
                                        value=<?= $bro->brokerkey ?> />
                                    <input type="text" class="text" name="brokervalue<?= $bro->id ?>"
                                        value=<?= $bro->brokervalue ?> />
                                </div>
                                <button type="submit" class="btnedt nf" name="broupdate"
                                    value=<?= $bro->id ?>>Update</button>
                                <button type="submit" class="btnrmvs nf" name="brodeleteItem"
                                    value=<?= $bro->id ?>>Delete</button>
                            </div>
                            <?php }
                                ?>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="inputs-value" id="brokerkey">
                        </div>
                        <div class="inputs-value" id="brokervalue">
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" id="toggle6" class="hidden" name="submit_broker" value="SUBMIT">
                    </div>
                </div>
                <?php
                } else {
                ?>
                <div class="bgx">
                    <div class="buttonsx">
                        <button type="button" class="btnadd" onclick="add1();add2();broker2()">Add</button>
                        <button type="button" class="btnrmv hidden" id="dis2"
                            onclick="remove1();remove2();count3()">Remove</button>
                    </div>
                    <?php if (isset($_SESSION['error_message_broker'])): ?>
                    <div class="error-message" style="margin-top:5px">
                        <?php echo $_SESSION['error_message_broker']; ?>
                    </div>
                    <?php unset($_SESSION['error_message_broker']); ?>
                    <?php endif; ?>
                    <div class="inputs">
                        <div class="inputs-key" id="brokerkey">
                        </div>
                        <div class="inputs-value" id="brokervalue">
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" id="toggle4" name="submit_broker" class="hidden" value="SUBMIT">
                    </div>
                </div>
                <?php
                }
                ?>
            </form>
        </div>
    </div>
    <div class="bottom">
        <div class="h3">DynamicFlow IT</div>
        <p class="para">E 2, Eastern Housing, Pallabi 2nd Phase, Mirpur, Dhaka-1216.</p>
        <h6 style="font-size:13px;font-style:italic; text-align:center">Developed By "Oleraj Hossin"</h6>
    </div>
</div>
<?php
}


//Table insert into Database
function crm_update_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'crm';
    // SQL to create your table
    $sql = "CREATE TABLE " . $table_name . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        apiid VARCHAR(255) NOT NULL,
        apikey VARCHAR(255) NOT NULL,
        PRIMARY KEY  (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    $table_name = $wpdb->prefix . 'crm_radio';
    // SQL to create your table
    $sql = "CREATE TABLE " . $table_name . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        radio VARCHAR(255) NOT NULL,
        radioid VARCHAR(255) NOT NULL,
        PRIMARY KEY  (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    $table_name = $wpdb->prefix . 'crm_visitor';
    // SQL to create your table
    $sql = "CREATE TABLE " . $table_name . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        vistiorkey VARCHAR(255) NOT NULL,
        vistiorvalue VARCHAR(255) NOT NULL,
        PRIMARY KEY  (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    $table_name = $wpdb->prefix . 'crm_broker';
    // SQL to create your table
    $sql = "CREATE TABLE " . $table_name . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        brokerkey VARCHAR(255) NOT NULL,
        brokervalue VARCHAR(255) NOT NULL,
        PRIMARY KEY  (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'crm_update_table');
function insert_initial_data()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'crm';
    $wpdb->insert(
        $table_name,
        array(
            'id' => '1',
            'apikey' => '',
            'apiid' => '',
        )
    );
    $table_name = $wpdb->prefix . 'crm_radio';
    $wpdb->insert(
        $table_name,
        array(
            'id' => '1',
            'radio' => '',
            'radioid' => '',
        )
    );
}
register_activation_hook(__FILE__, 'insert_initial_data');

//Data take from diplay page and insert to Database
function insert_data()
{
    if (isset($_POST['apikey']) && isset($_POST['apiid']) && isset($_POST['apisubmit'])) {
        $apikey = trim($_POST['apikey']);
        $apiid = trim($_POST['apiid']);
        
        if (empty($apikey) || empty($apiid)) {
            $_SESSION['error_message'] = 'Both API Key and API ID fields are required.';
            $location = $_SERVER['HTTP_REFERER'] . '#apis';
            wp_safe_redirect($location);
            exit;
        }
    
        try {
            global $wpdb;
            $table_name = $wpdb->prefix . 'crm';
            $wpdb->update(
                $table_name,
                array(
                    'apikey' => $apikey,
                    'apiid' =>  $apiid
                ),
                array(
                    'id' => 1
                )
            );
            $location = $_SERVER['HTTP_REFERER'] . '#apis';
            wp_safe_redirect($location);
            exit;
        } catch (Exception $e) {
            $_SESSION['error_message'] = 'There is something wrong with the input fields!';
            $location = $_SERVER['HTTP_REFERER'] . '#apis';
            wp_safe_redirect($location);
            exit;
        }
    }
    
    if (isset($_POST['radio']) && isset($_POST['radioid'])) {
        $radioid = $_POST['radioid'];
        $radio = $_POST['radio'];
        try {
            global $wpdb;
            $table_name = $wpdb->prefix . 'crm_radio';
            $wpdb->update(
                $table_name,
                array(
                    'radioid' => $radioid,
                    'radio' => $radio,
                ),
                array(
                    'id' => 1
                )
            );
            $location = $_SERVER['HTTP_REFERER'].'#radio';
            wp_safe_redirect($location);
            exit;
        } catch (Exception $e) {
            echo "<script>alert('There Someting Wrong in Input Field!');</script>";
            $location = $_SERVER['HTTP_REFERER'].'#radio';
            wp_safe_redirect($location);
            exit;
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_visitor'])) {
        try {
            global $wpdb;
            $table_name = $wpdb->prefix . 'crm_visitor';
    
            if (!empty($_POST['visitor']['key'])) {
                foreach ($_POST['visitor']['key'] as $key => $val) {
                    if (empty($val) || empty($_POST['visitor']['value'][$key])) {
                        throw new Exception('Input fields can\'t be empty');
                    }
    
                    $wpdb->insert(
                        $table_name,
                        array(
                            'vistiorkey' => $val,
                            'vistiorvalue' => $_POST['visitor']['value'][$key] ?? ''
                        )
                    );
                }
            }
            $location = $_SERVER['HTTP_REFERER'] . '#section-to-scroll';
            wp_safe_redirect($location);
            exit;
        } catch (Exception $e) {
            $_SESSION['error_message_visitor'] = 'Input field Can\'t be empty!';
            $location = $_SERVER['HTTP_REFERER'] . '#section-to-scroll';
            wp_safe_redirect($location);
            exit;
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_broker'])) {
        try {
            global $wpdb;
            $table_name = $wpdb->prefix . 'crm_broker';
    
            if (!empty($_POST['broker']['key'])) {
                foreach ($_POST['broker']['key'] as $key => $val) {
                    if (empty($val) || empty($_POST['broker']['value'][$key])) {
                        throw new Exception('Input fields can\'t be empty');
                    }
    
                    $wpdb->insert(
                        $table_name,
                        array(
                            'brokerkey' => $val,
                            'brokervalue' => $_POST['broker']['value'][$key] ?? ''
                        )
                    );
                }
            }
            $location = $_SERVER['HTTP_REFERER'] . '#section-to-scrolls';
            wp_safe_redirect($location);
            exit;
        } catch (Exception $e) {
            $_SESSION['error_message_broker'] = 'Input fields can\'t be empty';
            $location = $_SERVER['HTTP_REFERER'] . '#section-to-scrolls';
            wp_safe_redirect($location);
            exit;
        }
    }

    if(isset($_POST['visdeleteItem']) and is_numeric($_POST['visdeleteItem'])){
        $delete =intval($_POST['visdeleteItem']);
        try {
            global $wpdb;
            $table_name = $wpdb->prefix . 'crm_visitor';
            $wpdb->delete(
                $table_name,
                array('id' => $delete)
            );
            $_SESSION['success_message_visitor'] = 'Field Deleted Succesfully!';
            $location = $_SERVER['HTTP_REFERER']. '#section-to-scroll';;
            wp_safe_redirect($location);
            exit;
        } catch (Exception $e) {
            echo "<script>alert('There Someting Wrong in Input Field!');</script>";
            $location = $_SERVER['HTTP_REFERER'];
            wp_safe_redirect($location);
            exit;
        }
    }

    if(isset($_POST['visupdate']) and is_numeric($_POST['visupdate'])){
        $edit = $_POST['visupdate'];
        $visitorkey = $_POST['visitorkey'.$edit];
        $visitorvalue = $_POST['visitorvalue'.$edit];
        try {
            global $wpdb;
            $table_name = $wpdb->prefix . 'crm_visitor';
            $wpdb->update(
                $table_name,
                array(
                    'vistiorkey' => $visitorkey,
                    'vistiorvalue' => $visitorvalue,
                ),
                array(
                    'id' => $edit
                )
            );
            $_SESSION['success_message_broker'] = 'Field Edited Succesfully!';
            $location = $_SERVER['HTTP_REFERER']. '#section-to-scroll';
            wp_safe_redirect($location);
            exit;
        } catch (Exception $e) {
            $_SESSION['success_message_broker'] = 'Field Edited Succesfully!';
            $location = $_SERVER['HTTP_REFERER']. '#section-to-scroll';
            wp_safe_redirect($location);
            exit;
        }
    }

    if(isset($_POST['brodeleteItem']) and is_numeric($_POST['brodeleteItem'])){
        $delete =intval($_POST['brodeleteItem']);
        try {
            global $wpdb;
            $table_name = $wpdb->prefix . 'crm_broker';
            $wpdb->delete(
                $table_name,
                array('id' => $delete)
            );
            $_SESSION['success_message_broker'] = 'Field Deleted Succesfully!';
            $location = $_SERVER['HTTP_REFERER']. '#section-to-scrolls';
            wp_safe_redirect($location);
            exit;
        } catch (Exception $e) {
            echo "<script>alert('There Someting Wrong in Input Field!');</script>";
            $location = $_SERVER['HTTP_REFERER'];
            wp_safe_redirect($location);
            exit;
        }
    }

    if(isset($_POST['broupdate']) and is_numeric($_POST['broupdate'])){
        $edit = $_POST['broupdate'];
        $brokerkey = $_POST['brokerkey'.$edit];
        $brokervalue = $_POST['brokervalue'.$edit];
        try {
            global $wpdb;
            $table_name = $wpdb->prefix . 'crm_broker';
            $wpdb->update(
                $table_name,
                array(
                    'brokerkey' => $brokerkey,
                    'brokervalue' => $brokervalue,
                ),
                array(
                    'id' => $edit
                )
            );
            $_SESSION['success_message_broker'] = 'Field Edited Succesfully!';
            $location = $_SERVER['HTTP_REFERER']. '#section-to-scrolls';
            wp_safe_redirect($location);
            exit;
        } catch (Exception $e) {
            $_SESSION['success_message_broker'] = 'Field Edited Succesfully!';
            $location = $_SERVER['HTTP_REFERER']. '#section-to-scrolls';
            wp_safe_redirect($location);
            exit;
        }
    }
}
add_action('init', 'insert_data');

add_action('gform_after_submission', 'send_form_data_via_curl', 10, 2);
function send_form_data_via_curl($entry, $form)
{
    global $wpdb;
    $id = 1;
    // Fetch data from the crm table
    $table_name = $wpdb->prefix . 'crm';
    $resultx = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $id));
    // Fetch data from the crm_radio table
    $table_name = $wpdb->prefix . 'crm_radio';
    $resultradio = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d", $id));
    // Define the tables for brokers and visitors
    $broker_table = $wpdb->prefix . 'crm_broker';
    $resultbroker = $wpdb->get_results("SELECT * FROM $broker_table");
    $visitor_table = $wpdb->prefix . 'crm_visitor';
    $resultvisitor = $wpdb->get_results("SELECT * FROM $visitor_table");
    // Assuming $resultx is already defined, replace with actual data if needed
    $apiids = $resultx->apiid;
    $apikeys = $resultx->apikey;
    // (Assuming rgar($entry, 'field') is properly defined elsewhere) Radio Buton
    $radio_value = rgar($entry, $resultradio->radioid);

    $curl_data = array();
    if ($radio_value == $resultradio->radio) {
        $curl_url = 'https://condosales.saas.mrisoftware.com/api/v1/registration/visitor?ID=' . $apiids . '&key=' . $apikeys;
        $curl_url = "http://check-api.000.pe/api/api.php";
        foreach ($resultvisitor as $visitor) {
            $curl_data[$visitor->vistiorkey] = rgar($entry, $visitor->vistiorvalue);
        }
        $curl_data['redirect'] = 'https://google.com';
    } else {
        $curl_url = 'https://condosales.saas.mrisoftware.com/api/v1/registration/broker?ID=' . $apiids . '&key=' . $apikeys;
        $curl_url = "http://check-api.000.pe/api/api.php";        
        foreach ($resultbroker as $broker) {
            $curl_data[$broker->brokerkey] = rgar($entry, $broker->brokervalue);
        }
        $curl_data['redirect'] = 'https://google.com';
    }

    $curl_json_data = json_encode($curl_data);
    // echo "<pre>";
    // print_r($curl_json_data);
    // echo "</pre>";
    // exit;
    $curl_headers = array(
        'Content-Type: application/json'
    );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $curl_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_json_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $curl_headers);
    $response = curl_exec($curl);
    if ($response === false) {
        error_log('cURL Error: ' . curl_error($curl));
    } else {
        error_log('cURL Response: ' . $response);
    }
    curl_close($curl);
}

class CRM
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'assets'));
    }
    function assets()
    {
        wp_enqueue_style('style1x', plugins_url('/assets/css/style.css', __FILE__));
        wp_enqueue_script('functionjs', plugins_url('/assets/js/function.js', __FILE__), array());
    }
}
if (class_exists('CRM')) {
    $crmclass = new CRM;
    $crmclass->register();
}