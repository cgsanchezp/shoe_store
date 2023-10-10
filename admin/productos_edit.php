<?php require_once('../Connections/conexionzapatos.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tblproducto SET strNombre=%s, strSEO=%s, dblPrecio=%s, intEstado=%s, intCategoria=%s, strImagen=%s WHERE idProducto=%s",
                       GetSQLValueString($_POST['strNombre'], "text"),
                       GetSQLValueString($_POST['strSEO'], "text"),
                       GetSQLValueString($_POST['dblPrecio'], "double"),
                       GetSQLValueString($_POST['intEstado'], "int"),
                       GetSQLValueString($_POST['intCategoria'], "int"),
                       GetSQLValueString($_POST['strImagen'], "text"),
                       GetSQLValueString($_POST['idProducto'], "int"));

  mysql_select_db($database_conexionzapatos, $conexionzapatos);
  $Result1 = mysql_query($updateSQL, $conexionzapatos) or die(mysql_error());

  $updateGoTo = "productos_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$varProducto_DatosProducto = "0";
if (isset($_GET["recordID"])) {
  $varProducto_DatosProducto = $_GET["recordID"];
}
mysql_select_db($database_conexionzapatos, $conexionzapatos);
$query_DatosProducto = sprintf("SELECT * FROM tblproducto WHERE tblproducto.idProducto = %s", GetSQLValueString($varProducto_DatosProducto, "int"));
$DatosProducto = mysql_query($query_DatosProducto, $conexionzapatos) or die(mysql_error());
$row_DatosProducto = mysql_fetch_assoc($DatosProducto);
$totalRows_DatosProducto = mysql_num_rows($DatosProducto);

mysql_select_db($database_conexionzapatos, $conexionzapatos);
$query_ConsultaCategorias = "SELECT * FROM tblcategoria ORDER BY tblcategoria.strDescripcion ASC";
$ConsultaCategorias = mysql_query($query_ConsultaCategorias, $conexionzapatos) or die(mysql_error());
$row_ConsultaCategorias = mysql_fetch_assoc($ConsultaCategorias);
$totalRows_ConsultaCategorias = mysql_num_rows($ConsultaCategorias);
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">

<html dir="LTR" lang="es"><!-- InstanceBegin template="/Templates/carrito_C.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>productos_edit</title>
<!-- InstanceEndEditable -->
<script type="text/javascript" src="../iepngfix_tilebg.js"></script>

<link rel="stylesheet" type="text/css" href="../stylesheet.css">

<style type="text/css">

.ie6_png 			{behavior: url("../iepngfix.htc") }

.ie6_png img		{behavior: url("../iepngfix.htc") }

.ie6_png input		{behavior: url("../iepngfix.htc") }

</style>

<!--[if IE]>

   <script type="text/javascript" src="ie_png.js"></script>

   <script type="text/javascript">

       ie_png.fix('.png');

   </script>

<![endif]-->


<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>

<!-- header //-->

<!-- start -->



<table cellpadding="0" cellspacing="0" border="0" align="center" class="bg_main">

	<tr><td class="bg2_main">


		<table cellpadding="0" cellspacing="0" border="0" align="center" class="bg3_main">

			<tr><td class="row_1">

				
				<table cellpadding="0" cellspacing="0" border="0">

					<tr><td class="head2">

							<table border="0" cellspacing="0" cellpadding="0" class="header" width="100%">

								<tr>

									<td class="logo" width="100%"><a href="#">
                                    <div style="margin-right:170px;width:231px;">
                                    <img src="../images/33756-vl.png" border="0" alt="" width="231" height="98" ></div></a>
                                    </td>
                                    
							    </tr>
							</table>			

					</td></tr>

					<tr><td class="head3">

						<table cellpadding="0" cellspacing="0" border="0" class="head3_table">

							<tr>

								<td class="head3_td">

		<table cellpadding="0" cellspacing="0" border="0" class="menu">

			<tr>

				<td><a href="#"><img src="../images/m1.gif" border="0" alt="" width="58" height="8"></a></td>

				<td class="m_sep"><img src="../images/m_sep.gif" border="0" alt="" width="1" height="9"></td>

				<td><a href="#"><img src="../images/m2.gif" border="0" alt="" width="103" height="8"></a></td>

				<td class="m_sep"><img src="../images/m_sep.gif" border="0" alt="" width="1" height="9"></td>

				<td><a href="#"><img src="../images/m3.gif" border="0" alt="" width="44" height="8"></a></td>

				<td class="m_sep"><img src="../images/m_sep.gif" border="0" alt="" width="1" height="9"></td>

				<td><a href="#"><img src="../images/m4.gif" border="0" alt="" width="53" height="8"></a></td>

				<td class="m_sep"><img src="../images/m_sep.gif" border="0" alt="" width="1" height="9"></td>

				<td><a href="#"><img src="../images/m5.gif" border="0" alt="" width="76" height="8"></a></td>
			</tr>
		</table>								</td>

								<td style="padding:16px 0px 0px 0px;"><img src="../images/part2.gif" border="0" alt="" width="1" height="19"></td>

								<td style="padding:16px 9px 0px 20px;">

	<form name="search" action="#" method="get">	<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:215px;" class="header">

		<tr>

			<td style="width:100%;"><input type=text name="keywords" class="go" value=""></td>

			<td style="padding:0px 0px 0px 12px;"><input type="image" src="../images/button_search_prod.gif" border="0" alt=""></td>
		</tr>

	</table></form>								</td>

								<td><img src="../images/m_right.gif" border="0" alt="" width="8" height="48"></td>
							</tr>
						</table>

					</td></tr>

					<tr><td class="banner"><a href="#" target="_blank"><img src="../images/banner_02.gif" border="0" alt="Banner2" title=" Banner2 " width="351" height="113"></a></td></tr>
				</table>
			

            </td></tr>

            <tr><td class="cont_padd">           

            
<!-- end -->

<!-- start -->

<!-- end --><!-- header_eof //-->

<!-- body //-->

<table border="0" class="main_table" cellspacing="0" cellpadding="0">

<tr>

    <td class="box_width_td_left"><table border="0" class="box_width_left" cellspacing="0" cellpadding="0">

<!-- left_navigation //-->

<!-- categories //-->

          <tr>

            <td>

<table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBoxHeading_table"> 
  <tr> 
    <td><img src="../images/infoBoxHeading_tl.gif" border="0" alt="" width="5" height="5"></td> 
    <td  class="infoBoxHeading_t"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
    <td><img src="../images/infoBoxHeading_tr.gif" border="0" alt="" width="5" height="5"></td> 
  </tr> 
  <tr> 
    <td  class="infoBoxHeading_l"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
    <td  class="infoBoxHeading_td">Administrador</td> 
    <td  class="infoBoxHeading_r"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
  </tr> 
  <tr> 
    <td><img src="../images/infoBoxHeading_bl.gif" border="0" alt="" width="5" height="5"></td> 
    <td  class="infoBoxHeading_b"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></td> 
    <td><img src="../images/infoBoxHeading_br.gif" border="0" alt="" width="5" height="5"></td> 
  </tr> 
</table> 
<table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBox2_table"> 
  <tr> 
    <td  class="infoBox2_td"><table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBoxContents2_table"> 
  <tr> 
  
   <?php include("../includes/cabeceraadmin.php");
?>
    
  </tr> 
</table></td> 
  </tr> 
</table>            </td>
          </tr>

<!-- categories_eof //-->

<!-- specials //-->

          <tr>

            <td>

 
<table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBox_table"> 
  <tr> 
    <td  class="infoBox_td"><table border="0" width="100%" cellspacing="0" cellpadding="0"  class="infoBoxContents_table"> 
  <tr> 
    <td align="center"  class="boxText">

                    				</td> 
  </tr> 
</table></td> 
  </tr> 
</table>            </td>
          </tr>

<!-- specials_eof //-->

<!-- left_navigation_eof //-->

    </table></td>

<!-- body_text //-->

    <td class="content_width_td">			  

                            	

                        

               



			













<div align="right" class="main"><form name="filter" action="../index1.php" method="get">
</form></div> 




				<table cellpadding="0" cellspacing="0" border="0" class="cont_heading_table">

						<tr><td class="cont_heading_td">

							<table cellpadding="0" cellspacing="0" border="0" class="table2">

								<tr><td class="td2">

									<table cellpadding="0" cellspacing="0" border="0" class="table3">

										<tr><td class="td3">

											<table cellpadding="0" cellspacing="0" border="0" class="table4">

												<tr><td class="td4">&nbsp;</td>
											  </tr>
										</table>

									</td></tr>
								</table>

							</td></tr>
						</table>

					</td></tr>
				</table>	

								

<table cellpadding="0" cellspacing="0" border="0"><tr><td class="padd_3">



<div style="background:url(../images/line_.gif) 0px 0px repeat-x;"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></div> 

       

		



<div style="background:url(../images/line_x.gif) 0px 0px repeat-x;padding:0px 0px 1px 0px;"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></div> 

       

<table border="0" width="" cellspacing="0" cellpadding="0"> 
   <tr> 
     <td  class="tableBox_output_td main"><!-- InstanceBeginEditable name="contenido" -->
     
   <script>
function subirimagen()
{
	self.name = 'opener';
	remote = open('gestionimagen.php', 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}

</script>
    <h1>Editar Producto</h1>
    <p>&nbsp;</p>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Nombre:</td>
          <td><input type="text" name="strNombre" value="<?php echo htmlentities($row_DatosProducto['strNombre'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">SEO:</td>
          <td><input type="text" name="strSEO" value="<?php echo htmlentities($row_DatosProducto['strSEO'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Precio:</td>
          <td><input type="text" name="dblPrecio" value="<?php echo htmlentities($row_DatosProducto['dblPrecio'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Estado:</td>
          <td><select name="intEstado">
            <option value="1" <?php if (!(strcmp(1, htmlentities($row_DatosProducto['intEstado'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>>Activo</option>
            <option value="0" <?php if (!(strcmp(0, htmlentities($row_DatosProducto['intEstado'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>>Inactivo</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Categoria:</td>
          <td><select name="intCategoria">
            <?php 
do {  
?>
            <option value="<?php echo $row_ConsultaCategorias['idCategoria']?>" <?php if (!(strcmp($row_ConsultaCategorias['idCategoria'], htmlentities($row_DatosProducto['intCategoria'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>><?php echo $row_ConsultaCategorias['strDescripcion']?></option>
            <?php
} while ($row_ConsultaCategorias = mysql_fetch_assoc($ConsultaCategorias));
?>
          </select></td>
        </tr>
        <tr> </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Imagen:</td>
          <td><input type="text" name="strImagen" value="<?php echo htmlentities($row_DatosProducto['strImagen'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" />
          <input type="button" name="button" id="button" value="Subir Imagen" onClick="javascript:subirimagen();"/></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" value="Actualizar registro" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form1" />
      <input type="hidden" name="idProducto" value="<?php echo $row_DatosProducto['idProducto']; ?>" />
    </form>
    <p>&nbsp;</p>
      <!-- InstanceEndEditable --><br> 
       <br></td>
   </tr> 	
</table> 


<div style="background:url(../images/line_x.gif) 0px 100% repeat-x;padding:1px 0px 0px 0px;"><img src="../images/spacer.gif" border="0" alt="" width="1" height="1"></div> 

     


</td></tr></table>	</td>

<!-- body_text_eof //-->

	<td class="box_width_td_right"><table border="0" class="box_width_right" cellspacing="0" cellpadding="0">

<!-- right_navigation //-->

<!-- right_navigation_eof //-->

    </table></td>
  </tr>
</table>

<!-- body_eof //-->



<!-- footer //-->

			</td></tr>
		</table>

	</td></tr>

	<tr><td><img src="../images/spacer.gif" border="0" alt="" width="1" height="15"></td></tr>

	<tr><td class="footer_main">

				

<table cellpadding="0" cellspacing="0" border="0" align="center" class="footer2_main"><tr><td>		

					<table cellpadding="0" cellspacing="0" border="0" align="center" class="footer">

						<tr>
						  <td>&nbsp;</td>
						  <td class="footer2_td"><span><a href="#">Ofertas</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="#">B&uacute;squeda Avanzada</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="#">Comentarios</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="#">Crear Cuenta</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="#">Entrar</a></span><br>Copyright &copy; 2011 <a href="#">Mobile store</a> &nbsp;&nbsp; <b><a href="#">Confidencialidad</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="#">Condiciones de uso</a></b></td>
						</tr>
					</table>

		

</td></tr></table>		

	</td></tr>
</table>	





<!-- footer_eof //-->

</body>

<!-- InstanceEnd --></html>
<?php
mysql_free_result($DatosProducto);

mysql_free_result($ConsultaCategorias);
?>
