-- 1. VIEW
-- 가상의 테이블로, 보안과 함께 사용자의 편의성을 높이기 위해 사용
-- 여러테이블을 조인 할 시에 view를 생성하며,
-- 복잡한 SQL을 편리하게 조회 할 수 있는 장점이 있음
-- 단점 : INDEX를 사용할 수 없어 조회 속도가 느리다.

-- VIEW 생성
-- create [OR REPLACE] VIEW 뷰명
-- AS
-- 	SELECT 문
-- ;
-- 	**[OR REPLACE] : 기존의 뷰가 있을 경우 덮어쓰기를 합니다. **
CREATE VIEW view_employed_emp
AS 
	SELECT emp.*, tit.title
		FROM employees emp
		INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW();
		
SELECT * FROM view_employed_emp
WHERE emp_no <= 10005;

SELECT emp.*,
	tit.title
FROM employees emp
	INNER JOIN titles tit
	ON emp.emp_no = tit.emp_no
	AND tit.to_date >= NOW();