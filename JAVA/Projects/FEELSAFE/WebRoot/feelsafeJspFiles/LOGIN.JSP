<%@ page language="java" pageEncoding="ISO-8859-1"%>
<%@ taglib uri="http://jakarta.apache.org/struts/tags-bean" prefix="bean"%> 
<%@ taglib uri="http://jakarta.apache.org/struts/tags-html" prefix="html"%>
 
<html> 
	<head>
		<title>JSP for FeelSafeForm form</title>
	</head>
	<body>
		<html:form action="/feelSafe.do?do=loginpage">
		<bean:write property="errorMessage" name="feelSafeForm" filter="false"/>
		<table width="350" align="center"><tr><td>
		<fieldset>
		<legend class="h1">Login</legend>
		<table align="center" >
		<tr><td><br>
			User&nbsp;Name : </td><td><br><html:text property="username"/><html:errors property="username"/></td></tr>
		<tr><td>	Password&nbsp;&nbsp;&nbsp;:</td><td> <html:password property="password"/><html:errors property="password"/></td></tr>
		<tr><td colspan="2" align="center">
		<br>
			<html:submit>Sign In</html:submit>
		</td></tr>
		</table>
		</fieldset>
		
		<table align="right"><tr><td> <font color="red" size="5">Dont have an ID </font></td></tr><tr><td><a href="../feelsafeJspFiles/newuser.jsp"> Create NewUser</a></td></tr></table>
		</td></tr></table>

		</html:form>
	</body>
</html>

