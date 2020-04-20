<%@ page language="java" pageEncoding="ISO-8859-1"%>

<%@ taglib uri="http://jakarta.apache.org/struts/tags-bean" prefix="bean" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-html" prefix="html" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-logic" prefix="logic" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-tiles" prefix="tiles" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-template" prefix="template" %>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-nested" prefix="nested" %>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html:html locale="true">
  <head>
    <html:base />
    
    <title>employees.jsp</title>

	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->

<script language="javascript" src="../js/cal2.js"></script>
<script language="javascript" src="../js/cal_conf2.js"></script>
<script language="javascript" src="../js/timecal.js"></script>

  </head>
  
  <body>
  <html:form action="/feelSafe.do?do=addnewequipment1">
  <center>
  <b><font color="#FF0000"> ADD NEW EQUIPMENT</font> </b><br><br>
  <bean:write property="errorMessage" name="feelSafeForm" filter="false"/>
    <table>
	<tr><td align="right">Equipment Name</td><td ><html:text property="equipmentname"></html:text> </td></tr>
	<tr><td align="right">Equipment Fees</td><td ><html:text property="equipmentfees"></html:text> </td></tr>
    <tr><td colspan="2" height="50" align="center"><html:submit></html:submit> </td></tr>
    </table>
<!-- Scheduled Date and Scheduled Time need to be displayed in here by using bean:write -->
    </center>
    </html:form>
  </body>
</html:html>
