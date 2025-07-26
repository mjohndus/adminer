<?php

namespace AdminNeo;

return [
	// text direction - 'ltr' or 'rtl'
	'ltr' => 'ltr',
	// thousands separator - must contain single byte
	',' => ',',
	'0123456789' => '0123456789',
	// Editor - date format: $1 yyyy, $2 yy, $3 mm, $4 m, $5 dd, $6 d
	'$1-$3-$5' => '$1-$3-$5',
	// Editor - hint for date format - use language equivalents for day, month and year shortcuts
	'YYYY-MM-DD' => 'YYYY-MM-DD',
	// Editor - hint for time format - use language equivalents for hour, minute and second shortcuts
	'HH:MM:SS' => '시:분:초',

	// Bootstrap.

	// Login.
	'System' => '데이터베이스 형식',
	'Server' => '서버',
	'Username' => '사용자이름',
	'Password' => '비밀번호',
	'Permanent login' => '영구적으로 로그인',
	'Login' => '로그인',
	'Logout' => '로그아웃',
	'Logged as: %s' => '다음으로 로그인했습니다: %s',
	'Logout successful.' => '로그아웃을 성공했습니다.',
	'Invalid CSRF token. Send the form again.' => '잘못된 CSRF 토큰입니다. 다시 보내주십시오.',

	// Connection.
	'No extension' => '확장이 없습니다',
	// %s contains the list of the extensions, e.g. 'mysqli, PDO_MySQL'
	'None of the supported PHP extensions (%s) are available.' => 'PHP 확장(%s)이 설치되어 있지 않습니다.',
	'Session support must be enabled.' => '세션 지원을 사용해야만 합니다.',
	'Session expired, please login again.' => '세션이 만료되었습니다. 다시 로그인하십시오.',
	'%s version: %s through PHP extension %s' => '%s 버전 %s, PHP 확장 %s',

	// Settings.
	'Language' => '언어',

	'Refresh' => '새로 고침',

	// Privileges.
	'Privileges' => '권한',
	'Create user' => '사용자 만들기',
	'User has been dropped.' => '사용자를 제거했습니다.',
	'User has been altered.' => '사용자를 변경했습니다.',
	'User has been created.' => '사용자를 만들었습니다.',
	'Hashed' => 'Hashed',

	// Server.
	'Process list' => '프로세스 목록',
	'%d process(es) have been killed.' => '%d개 프로세스를 강제 종료하였습니다.',
	'Kill' => '강제 종료',
	'Variables' => '변수',
	'Status' => '상태',

	// Structure.
	'Column' => '열',
	'Routine' => '루틴',
	'Grant' => '권한 부여',
	'Revoke' => '권한 취소',

	// Queries.
	'SQL command' => 'SQL 명령',
	'%d query(s) executed OK.' => '%d개 쿼리를 잘 실행했습니다.',
	'Query executed OK, %d row(s) affected.' => '쿼리를 잘 실행했습니다. %d행을 변경했습니다.',
	'No commands to execute.' => '실행할 수 있는 명령이 없습니다.',
	'Error in query' => '쿼리의 오류',
	'Warnings' => '경고',
	'Execute' => '실행',
	'Stop on error' => '오류의 경우 중지',
	'Show only errors' => '오류 만 표시',
	'Time' => '시간',
	// sprintf() format for time of the command
	'%.3f s' => '%.3f 초',
	'History' => '이력',
	'Clear' => '삭제',
	'Edit all' => '모두 편집',

	// Import.
	'Import' => '가져 오기',
	'File upload' => '파일 올리기',
	'From server' => '서버에서 실행',
	'Webserver file %s' => '웹서버 파일 %s',
	'Run file' => '파일을 실행',
	'File does not exist.' => '파일이 존재하지 않습니다.',
	'File uploads are disabled.' => '파일 업로드가 잘못되었습니다.',
	'Unable to upload a file.' => '파일을 업로드 할 수 없습니다.',
	'Maximum allowed file size is %sB.' => '파일의 최대 크기 %sB.',
	'Too big POST data. Reduce the data or increase the %s configuration directive.' => 'POST 데이터가 너무 큽니다. 데이터 크기를 줄이거나 %s 설정을 늘리십시오.',
	'You can upload a big SQL file via FTP and import it from server.' => '큰 SQL 파일은 FTP를 통하여 업로드하여 서버에서 가져올 수 있습니다.',
	'You are offline.' => '오프라인입니다.',
	'%d row(s) have been imported.' => '%d개 행을 가져 왔습니다.',

	// Export.
	'Export' => '내보내기',
	'Output' => '출력',
	'open' => '열',
	'save' => '저장',
	'Format' => '형식',
	'Data' => '데이터',

	// Databases.
	'Database' => '데이터베이스',
	'Use' => '사용',
	'Invalid database.' => '잘못된 데이터베이스입니다.',
	'Alter database' => '데이터베이스 변경',
	'Create database' => '데이터베이스 만들기',
	'Database schema' => '데이터베이스 구조',
	'Permanent link' => '영구적으로 링크',
	'Database has been dropped.' => '데이터베이스를 삭제했습니다.',
	'Databases have been dropped.' => '데이터베이스를 삭제했습니다.',
	'Database has been created.' => '데이터베이스를 만들었습니다.',
	'Database has been renamed.' => '데이터베이스의 이름을 바꾸었습니다.',
	'Database has been altered.' => '데이터베이스를 변경했습니다.',
	// SQLite errors.
	'File exists.' => '파일이 이미 있습니다.',
	'Please use one of the extensions %s.' => '확장 %s 중 하나를 사용하십시오.',

	// Schemas (PostgreSQL, MS SQL).
	'Schema' => '스키마',
	'Alter schema' => '스키마 변경',
	'Create schema' => '스키마 추가',
	'Schema has been dropped.' => '스키마를 삭제했습니다.',
	'Schema has been created.' => '스키마를 추가했습니다.',
	'Schema has been altered.' => '스키마를 변경했습니다.',
	'Invalid schema.' => '잘못된 스키마입니다.',

	// Table list.
	'Engine' => '엔진',
	'engine' => '엔진',
	'Collation' => '정렬',
	'collation' => '정렬',
	'Data Length' => '데이터 길이',
	'Index Length' => '색인 길이',
	'Data Free' => '데이터 여유',
	'Rows' => '행',
	'%d in total' => '총 %d개',
	'Analyze' => '분석',
	'Optimize' => '최적화',
	'Vacuum' => '청소',
	'Check' => '확인',
	'Repair' => '복구',
	'Truncate' => '데이터 내용만 지우기',
	'Tables have been truncated.' => '테이블의 데이터 내용만 지웠습니다.',
	'Move to other database' => '다른 데이터베이스로 이동',
	'Move' => '이동',
	'Tables have been moved.' => '테이블을 옮겼습니다.',
	'Copy' => '복사',
	'Tables have been copied.' => '테이블을 복사했습니다.',
	'overwrite' => '덮어쓰기',

	// Tables.
	'Tables' => '테이블',
	'Tables and views' => '테이블과 뷰',
	'Table' => '테이블',
	'No tables.' => '테이블이 없습니다.',
	'Alter table' => '테이블 변경',
	'Create table' => '테이블 만들기',
	'Table has been dropped.' => '테이블을 삭제했습니다.',
	'Tables have been dropped.' => '테이블을 삭제했습니다.',
	'Table has been altered.' => '테이블을 변경했습니다.',
	'Table has been created.' => '테이블을 만들었습니다.',
	'Table name' => '테이블 이름',
	'Name' => '이름',
	'Show structure' => '구조 표시',
	'Column name' => '열 이름',
	'Type' => '형',
	'Length' => '길이',
	'Auto Increment' => '자동 증가',
	'Options' => '설정',
	'Comment' => '주석',
	'Drop' => '삭제',
	'Are you sure?' => '실행 하시겠습니까?',
	'Size' => '크기',
	'Compute' => '계산하기',
	'Move up' => '위로',
	'Move down' => '아래로',
	'Remove' => '제거',
	'Maximum number of allowed fields exceeded. Please increase %s.' => '정의 가능한 최대 필드 수를 초과했습니다. %s(을)를 늘리십시오.',

	// Views.
	'View' => '보기',
	'View has been dropped.' => '보기를 삭제했습니다.',
	'View has been altered.' => '보기를 변경했습니다.',
	'View has been created.' => '보기를 만들었습니다.',
	'Alter view' => '보기 변경',
	'Create view' => '뷰 만들기',

	// Partitions.
	'Partition by' => '파티션',
	'Partitions' => '파티션',
	'Partition name' => '파티션 이름',
	'Values' => '값',

	// Indexes.
	'Indexes' => '색인',
	'Indexes have been altered.' => '색인을 변경했습니다.',
	'Alter indexes' => '색인 변경',
	'Add next' => '다음 추가',
	'Index Type' => '색인 형',
	'length' => '길이',

	// Foreign keys.
	'Foreign keys' => '외부 키',
	'Foreign key' => '외부 키',
	'Foreign key has been dropped.' => '외부 키를 제거했습니다.',
	'Foreign key has been altered.' => '외부 키를 변경했습니다.',
	'Foreign key has been created.' => '외부 키를 만들었습니다.',
	'Target table' => '테이블',
	'Change' => '변경',
	'Source' => '소스',
	'Target' => '타겟',
	'Add column' => '열 추가',
	'Alter' => '변경',
	'Add foreign key' => '외부 키를 추가',
	'ON DELETE' => '지울 때',
	'ON UPDATE' => '업데이트할 때',
	'Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.' => '원본과 대상 열은 동일한 데이터 형식이어야만 합니다. 목표 열에 색인과 데이터가 존재해야만 합니다.',

	// Routines.
	'Routines' => '루틴',
	'Routine has been called, %d row(s) affected.' => '루틴을 호출했습니다. %d 행을 변경했습니다.',
	'Call' => '호출',
	'Parameter name' => '매개변수 이름',
	'Create procedure' => '시저 만들기',
	'Create function' => '함수 만들기',
	'Routine has been dropped.' => '루틴을 제거했습니다.',
	'Routine has been altered.' => '루틴을 변경했습니다.',
	'Routine has been created.' => '루틴을 추가했습니다.',
	'Alter function' => '함수 변경',
	'Alter procedure' => '시저 변경',
	'Return type' => '반환 형식',

	// Events.
	'Events' => '이벤트',
	'Event' => '이벤트',
	'Event has been dropped.' => '삭제했습니다.',
	'Event has been altered.' => '변경했습니다.',
	'Event has been created.' => '만들었습니다.',
	'Alter event' => '이벤트 변경',
	'Create event' => '만들기',
	'At given time' => '지정 시간',
	'Every' => '매 번',
	'Schedule' => '예약',
	'Start' => '시작',
	'End' => '종료',
	'On completion preserve' => '완성 후 저장',

	// Sequences (PostgreSQL).
	'Sequences' => '시퀀스',
	'Create sequence' => '시퀀스 만들기',
	'Sequence has been dropped.' => '시퀀스를 제거했습니다.',
	'Sequence has been created.' => '시퀀스를 추가했습니다.',
	'Sequence has been altered.' => '시퀀스를 변경했습니다.',
	'Alter sequence' => '순서 변경',

	// User types (PostgreSQL)
	'Create type' => '사용자 정의 형식 만들기',
	'Type has been dropped.' => '유형을 삭제했습니다.',
	'Type has been created.' => '유형을 추가했습니다.',
	'Alter type' => '형 변경',

	// Triggers.
	'Triggers' => '트리거',
	'Add trigger' => '트리거 추가',
	'Trigger has been dropped.' => '트리거를 제거했습니다.',
	'Trigger has been altered.' => '트리거를 변경했습니다.',
	'Trigger has been created.' => '트리거를 추가했습니다.',
	'Alter trigger' => '트리거 변경',
	'Create trigger' => '트리거 만들기',

	// Table check constraints.

	// Selection.
	'Select data' => '데이터를 선택하십시오',
	'Select' => '선택',
	'Functions' => '함수',
	'Aggregation' => '집합',
	'Search' => '검색',
	'anywhere' => '모든',
	'Sort' => '정렬',
	'descending' => '역순',
	'Limit' => '제약',
	'Limit rows' => '행 제약',
	'Text length' => '문자열의 길이',
	'Action' => '실행',
	'Unable to select the table' => '테이블을 선택할 수 없습니다',
	'Search data in tables' => '테이블 내 데이터 검색',
	'No rows.' => '행이 없습니다.',
	'%d row(s)' => '%d개 행',
	'Page' => '페이지',
	'last' => '마지막',
	'Load more data' => '더 많은 데이터 부르기',
	'Loading' => '부르는 중',
	'Whole result' => '모든 결과',
	'%d byte(s)' => '%d 바이트',

	// In-place editing in selection.
	'Modify' => '수정',
	'Use edit link to modify this value.' => '이 값을 수정하려면 편집 링크를 사용하십시오.',

	// Editing.
	'New item' => '항목 만들기',
	'Edit' => '편집',
	'original' => '원본',
	// label for value '' in enum data type
	'empty' => '비어있음',
	'Insert' => '삽입',
	'Save' => '저장',
	'Save and continue edit' => '저장하고 계속 편집하기',
	'Save and insert next' => '저장하고 다음에 추가',
	'Selected' => '선택됨',
	'Clone' => '복제',
	'Delete' => '삭제',
	// %s can contain auto-increment value, e.g. ' 123'
	'Item%s has been inserted.' => '%s 항목을 삽입했습니다.',
	'Item has been deleted.' => '항목을 삭제했습니다.',
	'Item has been updated.' => '항목을 갱신했습니다.',
	'%d item(s) have been affected.' => '%d개 항목을 갱신했습니다.',
	'You have no privileges to update this table.' => '이 테이블을 업데이트할 권한이 없습니다.',

	// Data type descriptions.
	'Numbers' => '숫자',
	'Date and time' => '시간',
	'Strings' => '문자열',
	'Binary' => '이진',
	'Lists' => '목록',
	'Network' => '네트워크 형',
	'Geometry' => '기하 형',
	'Relations' => '관계',

	// Editor - data values.
	'now' => '현재 시간',
	'yes' => '네',

	// Plugins.
];
