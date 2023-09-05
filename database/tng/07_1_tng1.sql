-- 1. 사원의 사원번호, 풀네임, 직책명을 출력
SELECT emp.emp_no, CONCAT(emp.first_name, ' ', emp.last_name) AS full_name, tit.title
FROM employees AS emp
	INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no;
		
-- 2. 사원의 사원번호, 성별, 현재 월급을 출력
SELECT emp.emp_no, emp.gender, sal.salary
FROM employees AS emp
	INNER JOIN salaries AS sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW();
		
-- 3. 10010 사원의 풀네임, 과거부터 현재까지 월급 이력을 출력
SELECT CONCAT(emp.first_name, ' ', emp.last_name) AS full_name, sal.salary
FROM employees AS emp
	INNER JOIN salaries AS sal
		ON emp.emp_no = sal.emp_no
		AND emp.emp_no = 10010;
-- 4. 사원의 사원번호, 풀네임, 소속부서명을 출력
SELECT emp.emp_no, CONCAT(emp.first_name, ' ', emp.last_name) AS full_name, dp.dept_name
FROM employees AS emp
	INNER JOIN dept_emp AS d_e
	ON emp.emp_no = d_e.emp_no
	JOIN departments as dp
	ON d_e.dept_no = dp.dept_no
WHERE d_e.to_date >= NOW();
	
-- 5. 현재 월급의 상위 10위까지 사원의 사번, 풀네임, 월급을 출력
SELECT emp.emp_no, CONCAT(emp.first_name, ' ', emp.last_name) AS full_name, sal.salary
FROM employees AS emp
	INNER JOIN salaries AS sal
	ON emp.emp_no = sal.emp_no
	AND sal.to_date >= NOW()
ORDER BY salary DESC
LIMIT 10;

-- 6. 현재 각 부서의 부서장의 부서명, 풀네임, 입사일을 출력
SELECT de.dept_name, CONCAT(emp.first_name, ' ', emp.last_name) AS full_name, emp.hire_date
FROM employees AS emp
	INNER JOIN dept_manager AS man
	ON emp.emp_no = man.emp_no
	JOIN departments AS de
	ON man.dept_no = de.dept_no
	AND man.to_date >= NOW();
	
-- 7. 현재 직책이 "Staff"인 사원의 현재 전체 평균 월급을 출력
SELECT title, AVG(sal.salary)
FROM titles  tit
	INNER JOIN salaries sal
	ON tit.emp_no = sal.emp_no
	AND tit.to_date >= NOW()
	AND sal.to_date >= NOW()
	AND tit.title = 'Staff'
GROUP BY title;

-- 8. 부서장직을 역임했던 모든 사원의 풀네임과 입사일, 사번, 부서번호를 출력
SELECT CONCAT(emp.first_name, ' ', emp.last_name) AS full_name, emp.hire_date, emp.emp_no, man.dept_no
FROM employees AS emp
	INNER JOIN dept_manager AS man
	ON emp.emp_no = man.emp_no;
	
-- 9. 현재 각 직급별 평균월급 중 60,000이상인 직급의 직급명, 평균월급(정수)를 내림차순으로 출력
SELECT title, FLOOR(AVG(salary))
FROM titles tit
	INNER JOIN salaries sal
	ON tit.emp_no = sal.emp_no
	AND tit.to_date >= NOW()
	AND sal.to_date >= NOW()
GROUP BY title
HAVING AVG(salary) >= 60000
ORDER BY AVG(salary) DESC;
	
-- 10. 현재 성별이 여자인 사원들의 직급별 사원수를 출력
SELECT emp.gender, tit.title, COUNT(*)
FROM employees emp
	INNER JOIN titles tit
	ON emp.emp_no = tit.emp_no
	AND emp.gender = 'F'
	AND tit.to_date >= NOW()
GROUP BY title;

-- 11. 퇴사한 여직원의 수
SELECT emp.gender, COUNT(*)
FROM employees emp
	INNER JOIN (
	SELECT emp_no
	FROM titles t
	GROUP BY t.emp_no HAVING MAX(t.to_date) != 99990101
	) tit
	ON emp.emp_no = tit.emp_no
GROUP BY emp.gender;