<?php

namespace App\Http\Controllers;

use App\DataTables\Scopes\ByClientIdScope;
use App\DataTables\Scopes\ByDateRange;
use App\DataTables\Scopes\ByDealIdScope;
use App\DataTables\Scopes\ByOrderByHour;
use App\DataTables\TransactionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Repositories\TransactionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class TransactionController extends AppBaseController
{
    /** @var  TransactionRepository */
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepo)
    {
        $this->transactionRepository = $transactionRepo;
    }

    /**
     * Display a listing of the Transaction.
     *
     * @param TransactionDataTable $transactionDataTable
     * @return Response
     */
    public function index(TransactionDataTable $transactionDataTable)
    {
        return $transactionDataTable->render('transactions.index');
    }

    /**
     * Show the form for creating a new Transaction.
     *
     * @return Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created Transaction in storage.
     *
     * @param CreateTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionRequest $request)
    {
        $input = $request->all();

        $transaction = $this->transactionRepository->create($input);

        Flash::success('Transaction saved successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Display the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.show')->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.edit')->with('transaction', $transaction);
    }

    /**
     * Update the specified Transaction in storage.
     *
     * @param  int              $id
     * @param UpdateTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionRequest $request)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $transaction = $this->transactionRepository->update($request->all(), $id);

        Flash::success('Transaction updated successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Remove the specified Transaction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $this->transactionRepository->delete($id);

        Flash::success('Transaction deleted successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Search method through passed parameters
     *
     * @return void
     */
    public function search(TransactionDataTable $transactionDataTable, Request $request)
    {
        $input = $request->all();

        //READING FROM CHECKBOX SELECTED AND CREATING THE ORDERBY RAW STRING
        $orderByRaw = [];
        isset($input['order_hour']) ? array_push($orderByRaw, $input['order_hour']) : null;
        isset($input['order_year']) ? array_push($orderByRaw, $input['order_year']) : null;
        isset($input['order_month']) ? array_push($orderByRaw, $input['order_month']) : null;
        isset($input['order_day']) ? array_push($orderByRaw, $input['order_day']) : null;
        $orderByRawString = implode(',', $orderByRaw);

        return $transactionDataTable
            ->addScope(new ByOrderByHour($orderByRawString))
            ->addScope(new ByDateRange($input['start_date'], $input['final_date']))
            ->addScope(new ByDealIdScope($input['deal_id']))
            ->addScope(new ByClientIdScope($input['client_id']))
            ->render('transactions.index');
        
    }

    /**
     * Method to go to input csv page
     *
     * @return void
     */
    public function getImportCSV()
    {
        return view('transactions.importcsv');
    }

    /**
     * Method to import a csv file, passed through request
     *
     * @return void
     */
    public function importCSV(Request $request)
    {
        $filePath = $request->file('csvfile');
        $this->transactionRepository->importCSV($filePath);
        return redirect(route('transactions.index'));
    }
}
