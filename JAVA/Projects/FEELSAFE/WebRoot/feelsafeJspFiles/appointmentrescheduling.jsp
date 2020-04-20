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
  <html:form name="form2" type="com.feelsafe.struts.form.FeelSafeForm" action="/feelSafe.do?do=healthawareness1">
  <center>
  <b><font color="#FF0000"> APPOINTMENT RE-SCHEDULING</font> </b><br><br>
    <table>
	<tr><td align="right">Fixed Date</td><td ><html:text property="patientdate" readonly="true"></html:text> <a href="javascript:showCal('Calendar3')"><html:img src="../images/cal.gif" width="10" height="10"/></a>	</td></tr>
	<tr><td align="right">Fixed Time</td><td >
		<input type="text" name="patienttime" class="textbox" size="12"  id='time1' onblur="validateDatePicker(this)"  readonly="readonly"></input> 
		<img src="../images/timepicker.gif" ALT="Pick a Start Time!" width="30" height="20"  BORDER="0" STYLE="cursor:hand" ONCLICK="selectTime(this,time1)"></td></tr>
    <tr><td colspan="2" height="50" align="center"><html:submit></html:submit> </td></tr>

	<tr><td align="right">Re-schedule Date</td><td ><html:text property="patientdate1" readonly="true"></html:text> <a href="javascript:showCal('Calendar2')"><html:img src="../images/cal.gif" width="10" height="10"/></a>	</td></tr>
	<tr><td align="right">Re-schedule Time</td><td >
		<input type="text" name="patienttime1" class="textbox" size="12"  id='time2' onblur="validateDatePicker(this)"  readonly="readonly"></input> 
		<img src="../images/timepicker.gif" ALT="Pick a Start Time!" width="30" height="20"  BORDER="0" STYLE="cursor:hand" ONCLICK="selectTime(this,time2)"></td></tr>
    <tr><td colspan="2" height="50" align="center"><html:submit></html:submit> </td></tr>
    
    </table>
<!-- Scheduled Date and Scheduled Time need to be displayed in here by using bean:write -->
    </center>
    </html:form>
  </body>
</html:html>
