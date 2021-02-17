<?php
$abi='[
	{
		"inputs": [
			{
				"internalType": "address payable",
				"name": "admin1_addr",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "admin2_addr",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "admin3_addr",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "admin4_addr",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "admin5_addr",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "admin6_addr",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "admin7_addr",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "admin8_addr",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "insure_addr",
				"type": "address"
			}
		],
		"stateMutability": "payable",
		"type": "constructor"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"internalType": "address",
				"name": "recommender_addr",
				"type": "address"
			},
			{
				"indexed": false,
				"internalType": "uint256",
				"name": "_value",
				"type": "uint256"
			}
		],
		"name": "Deposit",
		"type": "event"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"name": "addressIndices",
		"outputs": [
			{
				"internalType": "address",
				"name": "",
				"type": "address"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "cvip",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"stateMutability": "payable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address payable",
				"name": "recommender_addr",
				"type": "address"
			}
		],
		"name": "deposit",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"stateMutability": "payable",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "globalinfo",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "_history_top_balance",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "_total_balance",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "_insure_balance",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "_top_award_balance_1",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "_top_award_balance_7",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "_total_address",
				"type": "uint256"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "myinfo",
		"outputs": [
			{
				"internalType": "address",
				"name": "addr",
				"type": "address"
			},
			{
				"internalType": "uint256",
				"name": "amount",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "prepare_balance",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "released_amount",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "total_released",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "last_ts",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "last_days",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "is_cvip",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "burn_amount",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "cvip_num",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "recommend_num",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "wait_award",
				"type": "uint256"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address",
				"name": "",
				"type": "address"
			}
		],
		"name": "players",
		"outputs": [
			{
				"internalType": "address payable",
				"name": "addr",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "recommender_addr",
				"type": "address"
			},
			{
				"internalType": "uint256",
				"name": "amount",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "prepare_balance",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "released_amount",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "static_in_released_amount",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "total_released",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "last_ts",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "last_days",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "is_cvip",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "burn_amount",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "cvip_num",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "recommend_num",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "wait_award",
				"type": "uint256"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "redeposit",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address",
				"name": "addr",
				"type": "address"
			}
		],
		"name": "release_cvip_award",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address",
				"name": "addr",
				"type": "address"
			}
		],
		"name": "release_diary",
		"outputs": [
			{
				"internalType": "bool",
				"name": "",
				"type": "bool"
			}
		],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "release_diary_self",
		"outputs": [
			{
				"internalType": "bool",
				"name": "",
				"type": "bool"
			}
		],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address payable",
				"name": "topday1",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "topday2",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "topday3",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "topday4",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "topday5",
				"type": "address"
			}
		],
		"name": "release_topaward",
		"outputs": [
			{
				"internalType": "bool",
				"name": "",
				"type": "bool"
			}
		],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address payable",
				"name": "top1",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "top2",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "top3",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "top4",
				"type": "address"
			},
			{
				"internalType": "address payable",
				"name": "top5",
				"type": "address"
			}
		],
		"name": "release_topaward_week",
		"outputs": [
			{
				"internalType": "bool",
				"name": "",
				"type": "bool"
			}
		],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "withdraw",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address payable",
				"name": "player_address",
				"type": "address"
			}
		],
		"name": "withdraw_without_award",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"stateMutability": "nonpayable",
		"type": "function"
	}
]';