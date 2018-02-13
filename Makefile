all:
	mkdir -p proto/stubs
	rm -fr proto/stubs/*
	protoc --proto_path=./proto -I/usr/local/include --php_out=proto/stubs ./proto/*.proto
