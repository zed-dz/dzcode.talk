package feelsafeHibernatePackage;
// Generated by MyEclipse - Hibernate Tools



/**
 * Appointments generated by MyEclipse - Hibernate Tools
 */
public class Appointments extends AbstractAppointments implements java.io.Serializable {

    // Constructors

    /** default constructor */
    public Appointments() {
    }

	/** minimal constructor */
    public Appointments(Integer id) {
        super(id);        
    }
    
    /** full constructor */
    public Appointments(Integer id, Employees employeesByEmployeeuserid, Employees employeesByDoctoruserid, String patientname, Integer age, Integer sex, String healthproblem, String appointmentdate, String appointmenttime, Integer type) {
        super(id, employeesByEmployeeuserid, employeesByDoctoruserid, patientname, age, sex, healthproblem, appointmentdate, appointmenttime, type);        
    }
   
}
