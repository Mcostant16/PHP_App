<?php


function Get_Symbols ($db, $search)
{
	
	$user_results = array();
	//$v_yearvalue = SUBSTR($p_full_academic_year,2,2).SUBSTR($p_full_academic_year,7,2);
	//$query = "select * from symbols order by Symbol limit 5";
	$query = "select * from symbols where Symbols = :symbol";
	$statement_get_course = $db->prepare($query);
	$statement_get_course->bindValue(':symbol', $search);
//	$statement_get_course->bindValue(':in_prefix', $p_prefix);
//	$statement_get_course->bindValue(':in_code', $p_code);
	try {
        $statement_get_course->execute();
		} catch (Exception $e) 
			{
				$error_message = $e->getMessage();
				$user_results[0] = 'Error: '.$error_message;
				return $user_results;
				exit();
			} 
		try {
        $user_results = $statement_get_course->fetchAll();
		} catch (Exception $e) 
			{
				$user_results[0] = 'Error: '.$error_message;
				return $user_results;
				exit();
			}		
	$statement_get_course->closeCursor();

	return $user_results;
}
////////////////////////////////////////////////////////////////////////
// Function to return COURSE variables for all courses
//     Input parameter = $db (database connection object)
//                       $p_full_academic_year (academic year yyyy-yyyy) 
//                       $p_prefix (subject code) 
//                       $p_code (course number) 
//     Returned value = array $user_results
//                      If errors are encountered, the first element
//                         in the array will begin with "Error:"
function Get_all_COURSE ($db)
{
	
	$user_results = array();

	$query = "select concat('20',
	                        SUBSTRING(b.yearvalue,1,2),
					             '-20',
								     SUBSTRING(b.yearvalue,3,2),
									  '-',a.prefix,
									  '-', 
									  a.code, 
									  '-', 
									  a.name) as sortkey,
                    a.yearid,
                    a.courseid, 
                    a.prefix,
                    a.code,
                    a.name
               from COURSE a, ACADEMICYEAR b
              where a.yearid = b.yearid 
           order by b.yearvalue desc, a.prefix asc, a.code asc, a.name asc";
	  
	$statement_get_all_course = $db->prepare($query);

	try {
        $statement_get_all_course->execute();
		} catch (Exception $e) 
			{
				$error_message = $e->getMessage();
				$user_results[0] = 'Error: '.$error_message;
				return $user_results;
				exit();
			} 
		try {
        $user_results = $statement_get_all_course->fetchAll();
		} catch (Exception $e) 
			{
				$user_results[0] = 'Error: '.$error_message;
				return $user_results;
				exit();
			}		
	$statement_get_all_course->closeCursor();

	return $user_results;

}
////////////////////////////////////////////////////////////////////////
// Function to return COURSE variables for a given Academic Year/Prefix/Code
//     Input parameter = $db (database connection object)
//                       $p_full_academic_year (academic year yyyy-yyyy) 
//                       $p_prefix (subject code) 
//                       $p_code (course number) 
//     Returned value = array $user_results
//                      If errors are encountered, the first element
//                         in the array will begin with "Error:"

function Get_COURSE_BY_COURSEID ($db, $p_courseid)
{
	
	$user_results = array(); 

	$query = "select a.COURSEID,
							a.PREFIX,
							a.CODE,
							b.YEARVALUE,
							a.DISCIPLINEID, 
	                 CAST(a.NAME AS CHAR(500)) AS NAME,
					      a.CREDITHOURS,
                    cast(a.DESCRIPTION as char(1500)) AS DESCRIPTION,	
							cast(a.LECTURELAB as char(500)) AS LECTURELAB,	
							cast(a.REPEATABILITY as char(200)) AS REPEATABILITY,	
							cast(a.PREREQ as char(500)) AS PREREQ,	
							cast(a.COREQ as char(500)) AS COREQ,	
							cast(a.NOTE as char(500)) AS NOTE,
							cast(a.NOTE1 as char(500)) AS NOTE1,	
							cast(a.NOTE2 as char(500)) AS NOTE2,		
							cast(a.CLASSHOURS as char(100)) AS CLASSHOURS,	
							cast(a.LABHOURS as char(100)) AS LABHOURS,	
							cast(a.REVISED as char(100)) AS REVISED,	
							cast(a.TEXTBOOK as char(10000)) AS TEXTBOOK,	
							cast(a.WEEKTOPIC as char(15000)) AS WEEKTOPIC,	
							cast(a.COURSEGOALS as char(5000)) AS COURSEGOALS,	
							cast(a.COURSEWILL as char(5000)) AS COURSEWILL,	
							cast(a.LEARNINGOUTCOMES as char(5000)) AS LEARNINGOUTCOMES,	
							cast(a.STUDENTSWILL as char(10000)) AS STUDENTSWILL,	
							cast(a.EVALUATION as char(30000)) AS EVALUATION,
							cast(a.MOREEVALUATION as char(500)) AS MOREEVALUATION,
							cast(a.COURSEPOLICY as char(15000)) AS COURSEPOLICY,
							a.DISCIPLINEPOLICY,
							a.POLICYDEPARTMENT,
							a.COLLEGEPOLICY,
							a.DRAFT,
							a.REVIEW,
							cast(a.TODO as char(200)) AS TODO,
							a.LOCKED,
							c.NAME AS DEPARTMENTNAME,
							d.POLICY AS DISCIPLINEPOLICYTEXT,
							e.POLICY AS COLLEGEPOLICYTEXT,
							f.POLICY AS DEPARTMENTPOLICYTEXT,
							cast(a.TBR_DLO_PLO as char(5000)) AS TBRDLOPLO,
							cast(a.SLO_NOTE as char(5000)) AS SLONOTE,
							cast(a.SLO_LIST as char(5000)) AS SLOLIST    
	            from COURSE a
         inner join (ACADEMICYEAR b, DISCIPLINE c, POLICY d, POLICY e, POLICY f)
                        ON (a.YEARID = b.YEARID AND 
                            a.DISCIPLINEID = c.DISCIPLINEID AND
                            a.DISCIPLINEPOLICY = d.POLICYID AND
                            a.COLLEGEPOLICY = e.POLICYID AND  
                            a.POLICYDEPARTMENT = f.POLICYID
                           )
	           where a.courseid = :in_courseid";
	$statement_get_course = $db->prepare($query);
	$statement_get_course->bindValue(':in_courseid', $p_courseid);
	try {
        $statement_get_course->execute();
		} catch (Exception $e) 
			{
				$error_message = $e->getMessage();
				$user_results[0] = 'Error: '.$error_message;
				return $user_results;
				exit();
			} 
		try {
        $user_results = $statement_get_course->fetch();
		} catch (Exception $e) 
			{
				$user_results[0] = 'Error: '.$error_message;
				return $user_results;
				exit();
			}		
	$statement_get_course->closeCursor();

	return $user_results;
}
////////////////////////////////////////////////////////////////////////
// Function to return COURSE counts and Discopline Name for a given Academic Year
//     Input parameter = $db (database connection object)
//                       $p_academicyearid  
//     Returned value = array $user_results
//                      If errors are encountered, the first element
//                         in the array will begin with "Error:"

function Get_COURSE_COUNT_BY_DISCIPLINE ($db, $p_academicyearid)
{
	
	$user_results = array();

	$query = "select c.name, c.disciplineid, COUNT(*)
	            from COURSE a
         inner join (ACADEMICYEAR b, DISCIPLINE c)
                        ON (a.YEARID = b.YEARID AND 
                            a.DISCIPLINEID = c.DISCIPLINEID 
                           )

	           where a.yearid = :in_academicyearid
			      group by c.name";
	$statement_get_course = $db->prepare($query);
	$statement_get_course->bindValue(':in_academicyearid', $p_academicyearid);
	try {
        $statement_get_course->execute();
		} catch (Exception $e) 
			{
				$error_message = $e->getMessage();
				$user_results[0] = 'Error: '.$error_message;
				return $user_results;
				exit();
			} 
		try {
        $user_results = $statement_get_course->fetchAll();
		} catch (Exception $e) 
			{
				$user_results[0] = 'Error: '.$error_message;
				return $user_results;
				exit();
			}		
	$statement_get_course->closeCursor();

	return $user_results;
}
////////////////////////////////////////////////////////////////////////
// Function to return COURSE counts and Discopline Name for a given Academic Year
//     Input parameter = $db (database connection object)
//                       $p_academicyearid  
//     Returned value = array $user_results
//                      If errors are encountered, the first element
//                         in the array will begin with "Error:"

function Get_Courses_by_AcademicYear_Discipline ($db, $p_academicyearid, $p_disciplineid)
{
	
	$user_results = array();

	$query = "select a.courseid, a.prefix, a.code, a.name
	            from COURSE a
	           where a.yearid = :in_academicyearid
		          and a.disciplineid = :in_disciplineid
			  order by a.prefix, a.code";

	$statement_get_course = $db->prepare($query);
	$statement_get_course->bindValue(':in_academicyearid', $p_academicyearid);
	$statement_get_course->bindValue(':in_disciplineid', $p_disciplineid);
	try {
        $statement_get_course->execute();
		} catch (Exception $e) 
			{
				$error_message = $e->getMessage();
				$user_results[0] = 'Error: '.$error_message;
				return $user_results;
				exit();
			} 
		try {
        $user_results = $statement_get_course->fetchAll();
		} catch (Exception $e) 
			{
				$user_results[0] = 'Error: '.$error_message;
				return $user_results;
				exit();
			}		
	$statement_get_course->closeCursor();

	return $user_results;
}
?>