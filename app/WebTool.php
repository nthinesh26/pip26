<?php

namespace App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Str;

/*
function setValueByName(name, value) {
    const $el = $('[name="' + name + '"]');

    if (!$el.length) return;

    const type = $el.attr('type');

    if (type === 'radio') {
        $el.filter('[value="' + value + '"]').prop('checked', true);

    } else if (type === 'checkbox') {
        if (Array.isArray(value)) {
            $el.each(function () {
                $(this).prop('checked', value.includes($(this).val()));
            });
        } else {
            $el.prop('checked', value);
        }

    } else {
        $el.val(value);
    }
}

*/

class WebTool
{
    public static function name($text)
    {
        return ucwords(strtolower($text));
    }

    public static function downloadFile($file, $name){
        
        return Storage::disk('private')->download(
            $file,
            $name
        );
    }

    public static function encr64($EncText)
    {
        $Key = "*&^SCI39022";
        return base64_encode($Key . $EncText);
    }

    public static function validateName($input)
    {
        return preg_match("/^[a-zA-Z ]*$/", subject: $input);
    }
    // ('ssm_cert_upload', 'documents/mof-certificates')
    
    public static function privateStore(string $target, string $path)
    {
        if (!request()->hasFile($target)) {
            return null;
        }

        $file = request()->file($target);

        // Single file
        if ($file instanceof UploadedFile) {
            return $file->store($path, 'private');
        }

        // Multiple files (safety)
        if (is_array($file)) {
            return collect($file)->map(
                fn (UploadedFile $f) => $f->store($path, 'private')
            )->toArray();
        }

        return null;
    }



    public static function upload($folder, $request)
    {
        if (isset($request)) {
            $file = request()->$request;
            $destinationPath = $folder;
            $ext = $file->getClientOriginalExtension();
            $ext = strtolower($ext);
            if (($ext == 'png') || ($ext == 'jpg') || ($ext == 'pdf') || ($ext == 'jpeg')) {
                $file_name = $folder . "-" . date('His') . "-" . rand() . '.' . $ext;
                $d = 1;
                $file->move($destinationPath, $file_name) or $d = 0;

                if ($d > 0)
                    return $folder . "/" . $file_name;
                else
                    return 'error';
            }
            return 'error';
        }
    }

    public static function custom_uploader($target, $name = 'photo',  $accept = '.pdf', $label = '', $tag = 'photo')
    {
        $id = $name;
        $q = file_exists($target);
?>
<div class="text-center" style="padding-bottom: 15px;"><img src="/images/upload.png"
        style="cursor: pointer; width: 35px !important;" id="bq_<?= $name ?>" class="file-bars" alt=""
        data-target="#<?= $name ?>" width="30"><?php if ($q) { ?> &nbsp;&nbsp;&nbsp;<a href="/<?= $target ?>"
        target="_blank"><img src="/images/download.png"></a><?php } ?><div><small
            class="text-primary"><?= $label ?></small></div>
</div>
<input type="file" style="display: none" class="file-uploads" data-path="" style="border: 0px !important"
    data-source="<?= $name ?>" data-target="#img-<?= $tag ?>" data-class=".<?= $tag ?>" id="<?= $name ?>"
    accept="<?= $accept ?>" name="<?= $id ?>" id="<?= $id ?>" required="required" />
<?php
    }

    public static function toaster($title, $message)
    {
    ?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="/images/logo.png" class="rounded me-2" alt="...">
            <strong class="me-auto"><?= $title ?></strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php echo $message; ?>
        </div>
    </div>
</div>
<?php
    }


    public static function remove_lines($values)
    {
        return preg_replace("/[\n\r]/", "", $values);
    }

    public static function passing($variable)
    {
        $passings = '';
        foreach ($variable as $key => $value) {
            $passings .= "$('#" . $key . "').val('" . preg_replace("/[\n\r]/", "", $value) . "'); ";
        }
        return "
    			<script type='text/javascript'>
	    			$(document).ready(function(e){
					" . $passings . "
				});
    			</script>
    		";
    }

    public static function passingByName($variable)
    {
        // for this related screipt need to be impalemented in root file as JS
        $passings = '';
        foreach ($variable as $key => $value) {
            $passings .= 'setValueByName("'. $key .'", "'. $value .'");';
        }
        return '
    			<script type="text/javascript">
	    			$(document).ready(function(e){
                    '. $passings .'
				});
    			</script>
    		';
    }

    public static function selectInject($target, $val)
    {
        $passings = "$('#" . $target . "').val('" . $val . "');";
        return "
                <script type='text/javascript'>
                    $(document).ready(function(e){
                    " . $passings . "
                });
                </script>
            ";
    }

    public static function encode($num, $addon = 0)
    {
        $add = 0;
        if ($addon > 0)
            return $num + 458001 + $addon;
        return $num + 458001;
    }

    public static function decode($num, $addon = 0)
    {
        if ($addon > 0) {
            $find = strlen($addon);
            $txt = $num - 458001;
            $substr = substr($addon, -$find);
            return $txt - $substr;
        }
        return ($num - 458001);
    }

    public static function doc_staus($title)
    {
        return explode(' ', $title)[0];
    }

    public static function enc($text, $target = 1)
    {
        for ($x = 1; $x <= $target; $x++)
            $text =  encrypt($text);

        return $text;
    }

    public static function dec($text, $target = 1)
    {

        for ($x = 1; $x <= $target; $x++)
            $text =  decrypt($text);
        return $text;
    }

    public static function current_url($d = 0)
    {
        $server = 'http://127.0.0.1:8000';
        if ($d == 0)
            return url()->current();
        else
            return explode($server, url()->current())[1];
    }

    public static function clear_div($id = 'my_id')
    {
    ?>
<script type="text/javascript">
$(document).ready(function(e) {
    $("#<?= $id ?>").html('');
});
</script>
<?php
    }





    public static function component_disp($json_value = '[]')
    {
        $txt = '';
        foreach (json_decode($json_value) as $component) {
            $txt .= '<did>' . $component->value . '</div><div style="padding-bottom:10px"><small>(' . $component->holder . ')</small></div>';
        }
        return $txt;
    }



    public static function alert($message = '', $type = 'primary', $fa = 'info')
    {
        return static::qucik_alert($message, $type, $fa);
    }

    public static function custom_js($js = '')
    {
    ?>
<script type="text/javascript">
$(document).ready(function(e) {
    <?php
                echo $js;
                ?>
});
</script>
<?php
    }

    public static function custom_text($target = 5, $flag = false)
    {
        $reference = 'qQWERTYUIOPASDFG9HJKLZXSCICOMC45678VBNM123qwertyuiopasdfghjkzxcvbnm!@#$%%';
        $text = '';
        for ($t = 1; $t <= $target; $t++) {
            $text .= $reference[rand(1, (strlen($reference) - 1))];
        }
        if ($flag)
            return bcrypt($text);
        else
            return $text;
    }

    public static function qucik_alert($message, $class = 'primary', $fa = 'star')
    {
        return '<div class="alert alert-' . $class . ' alert-dismissible mb-2" role="alert">
            <div class="d-flex align-items-center">
                <i class="bx bx-' . $fa . '"></i>
                <span>
                    ' . $message . '
                </span>
            </div>
        </div>';
    }

    public static function print_alert($message, $class = 'primary', $fa = 'star')
    {
        return '<div class="alert btn-' . $class . ' alert-dismissible mb-2" role="alert">
            <div class="d-flex align-items-center">
                <i class="fa fa-' . $fa . '"></i>&nbsp;
                <span>
                    ' . $message . '
                </span>
            </div>
        </div>';
    }

    public static function message($title, $message = '', $type = 'success')
    {
        return "<script>swal('" . $title . "', '" . $message . "', '" . $type . "');</script>";
    }
    public static function quickRand()
    {
        $letters = 'QWERTYUIOPASDFGHJKLZXCVBNM';
        return $letters[rand(0, 25)] . '5' . $letters[rand(0, 25)] . '2' . $letters[rand(0, 25)] . rand(1111, 9999);
    }

    public static function curr_sym($c = 'LKR')
    {
        return [
            'LKR' => 'Rs',
            'GBP' => '£',
            'INR' => '₹'
        ][$c];
    }
}
?>