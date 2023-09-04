-- SELECT [컬럼명] FROM [테이블명];
SELECT * FROM employees; 
SELECT * FROM dept_emp;

-- 
SELECT first_name, last_name FROM employees;
SELECT emp_no, title FROM titles;

-- SELECT [컬럼명] FROM [테이블명] WHERE [쿼리 조건];
-- [쿼리 조건] : 컬럼명 [기호(<,>,=)] 조건값
SELECT * FROM employees WHERE emp_no <= 10009;
SELECT * FROM employees WHERE first_name = 'Mary';
SELECT * FROM employees WHERE birth_date >= 19600101;

-- and, or 연산자
SELECT *
FROM employees
WHERE birth_date <= 19700101
	AND birth_date >= 19650101;
	
SELECT *
FROM employees
WHERE first_name = 'Mary'
	OR last_name = 'Piazza';
	
-- BETWEEN
SELECT *
FROM employees
WHERE emp_no >= 10005
	AND emp_no <= 10010;
	
SELECT *
FROM employees
WHERE emp_no BETWEEN 10005 AND 10010;

--  IN()으로 해당 데이터 조회
SELECT *
FROM employees
WHERE emp_no = 10005 OR emp_no = 10010;

SELECT *
FROM employees
WHERE emp_no IN(10005, 10010);

-- LIKE로 문자열의 내용을 조회
-- > "%"는 무엇이든 허용한다는 의미
SELECT *
FROM employees
WHERE first_name LIKE('%Ge%');

SELECT *
FROM titles
WHERE title LIKE('%Staff%');

-- "_"의 개수만큼 허용
SELECT *
FROM employees
WHERE first_name LIKE('___Ge_');

-- ORDER BY로 정렬하여 조회
SELECT * FROM employees ORDER BY birth_date ASC;
SELECT * FROM employees ORDER BY birth_date DESC;

SELECT * FROM employees ORDER BY birth_date, first_name, last_name;

-- 성을 내림차순으로 정렬하고, 이름을 오름차순으로 정렬하고, 생일을 오름차순으로 정렬
SELECT * FROM employees ORDER BY last_name DESC, first_name, birth_date ASC;

-- DISTINCT로 중복되는 레코드 없이 조회
SELECT emp_no, salary FROM salaries;
SELECT DISTINCT emp_no, salary FROM salaries;

-- 집계 함수
SELECT SUM(salary) FROM salaries;
-- 현재 받고있는 급여만 조회
SELECT * FROM salaries WHERE to_date >= 20230901;
-- SUM(컬럼명) : 합계를 구한다.
SELECT SUM(salary) FROM salaries WHERE to_date >= 20230901;
-- MAX(컬럼명) : 최대값를 구한다.
SELECT MAX(salary) FROM salaries WHERE to_date >= 20230901;
-- MIN(컬럼명) : 최소값를 구한다.
SELECT MIN(salary) FROM salaries WHERE to_date >= 20230901;
-- AVG(컬럼명) : 평균을  구한다.
SELECT AVG(salary) FROM salaries WHERE to_date >= 20230901;

-- COUNT(컬럼명) : 개수를 구한다.
SELECT COUNT(*) FROM employees;
-- 이름이 Mary인 사람의 수
SELECT COUNT(*) FROM employees WHERE first_name = 'Mary';

-- 그룹으로 묶어서 조회 : GROUP BY 컬럼명 [ HAVING 집계함수조건 ]
-- 현재 재직중인 직급별로 직원들의 수를 구함
SELECT title, COUNT(title)
FROM titles
WHERE to_date >= 20230901
GROUP BY title;
-- 하나만
SELECT COUNT(*)
FROM titles
WHERE title = 'Assistant Engineer';

-- 속성명에 "AS"를 이용하여 별칭을 줄 수 있습니다.
SELECT title, COUNT(title) AS cnt
FROM titles
WHERE to_date >= 20230901
GROUP BY title HAVING title LIKE('%staff%');

-- CONCAT() : 문자열을 합쳐 주는 함수
SELECT CONCAT(first_name, ' ', last_name) AS full_name
FROM employees;

-- 여자 사원의 사번, 생일, 풀네임을 풀네임  오름차순으로  출력
SELECT emp_no, birth_date, CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
WHERE gender = 'F'
ORDER BY full_name ASC;

-- LIMIT n : 상위 n개만 보여줌 
-- OFFSET n : n번째 부터 ~
SELECT * FROM employees ORDER BY emp_no
LIMIT 10 OFFSET 10;

-- 재직 중인 사원들 중 급여가 상위 5위까지 출력
SELECT *
FROM salaries
WHERE to_date >= 20230901
ORDER BY salary DESC
LIMIT 5;

-- 서브쿼리(SubQuery) : 쿼리 안에 또다른 쿼리가 있는 형태
-- d002 부서의 현재 매니저의 정보를 가져오고 싶다
SELECT *
FROM employees
WHERE emp_no = (
	SELECT emp_no
	FROM dept_manager
	WHERE to_date >= 20230901
		AND dept_no = 'd002');
	
-- 현재 급여가 가장 높은 사원의 사번과 풀네임을 출력
SELECT emp_no, CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
WHERE emp_no = (
	SELECT emp_no
	FROM salaries
	WHERE to_date >= 20230901
	ORDER BY salary DESC
	LIMIT 1);
	
-- 서브쿼리의 결과가 복수일 때 사용방법
-- d001 부서에 속한적이 있는 사원의 사번과 풀네임을 출력
SELECT emp_no, CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
WHERE emp_no IN (
	SELECT emp_no
	FROM dept_manager
	WHERE dept_no = 'd001');
	
-- 현재 직책이 Senior Engineer인 사원의 사번과 생일을 출력
SELECT emp_no, birth_date
FROM employees
WHERE emp_no IN (
	SELECT emp_no
	FROM titles
	WHERE to_date >= 20230901
		AND title = 'Senior Engineer');
	
-- 다중열 서브쿼리
-- 현재 부서장인 사람의 소속부서테이블의 모든 정보를 출력
SELECT *
FROM dept_emp
WHERE (emp_no, dept_no) IN (
	SELECT emp_no, dept_no
	FROM dept_manager
	WHERE to_date >= NOW()
);

-- SELECT절에 사용하는 서브쿼리
-- 사원의 현재 급여, 현재 급여를 받기 시작한 일자, 풀네임 출력
SELECT 
	sal.salary,
		sal.from_date,
		(
		SELECT CONCAT(emp.first_name, ' ', emp.last_name)
		FROM employees AS emp
		WHERE sal.emp_no = emp.emp_no
	) AS full_name
FROM salaries AS sal
WHERE sal.to_date >= NOW();

-- FROM절에 오는 서브쿼리
SELECT  emp.*
FROM (
	SELECT *
	FROM employees
	WHERE gender = 'M'
) AS emp;