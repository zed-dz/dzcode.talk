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
  <html:form name="form1" type="com.feelsafe.struts.form.FeelSafeForm" action="/feelSafe.do?do=appointmentscheduling1">
  <center>
  <b><font color="#FF0000"> APPOINTMENT SCHEDULING</font> </b><br><br>
  <bean:write property="errorMessage" name="feelSafeForm" filter="false"/>
    <table>
    <tr><td align="right">Name of the Patient</td><td ><html:text property="patientname"></html:text> </td></tr>
    <tr><td align="right">Age</td><td ><html:text property="patientage"></html:text> </td></tr>
    <tr><td align="right">Sex</td><td ><html:radio property="patientsex" value="1">Male</html:radio><html:radio property="patientsex" value="2">Female</html:radio> </td></tr>
    <tr><td align="right">Health Problem To Be Consulted</td><td ><html:text property="patienthealthproblem"></html:text> </td></tr>
    <tr><td colspan="2" align="center"><br><br><font color="green"><b>ENTER THE DATE AND TIME OF APPOINTMENT :</b></font></td></tr>
	<tr><td align="right">Date</td><td ><html:text property="patientdate" readonly="true"></html:text> <a href="javascript:showCal('Calendar1')"><html:img src="../images/cal.gif" width="10" height="10"/></a>	</td></tr>
	<tr><td align="right">Time</td><td >
	
		<input type="text" name="patienttime" class="textbox" size="12"  id='time1' onblur="validateDatePicker(this)"  readonly="readonly"></input> 
	
		<img src="../images/timepicker.gif" ALT="Pick a Start Time!" width="30" height="20"  BORDER="0" STYLE="cursor:hand" ONCLICK="selectTime(this,time1)"></td></tr>
    <tr><td colspan="2" height="50" align="center"><html:submit></html:submit> </td></tr>
    
    </table>
<!-- Scheduled Date and Scheduled Time need to be displayed in here by using bean:write -->
    </center>
    </html:form>
  </body>
</html:html>
